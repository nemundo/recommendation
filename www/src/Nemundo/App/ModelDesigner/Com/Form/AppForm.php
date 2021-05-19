<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\Application\ClassDesigner\ApplicationClassBuilder;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Project\AbstractProject;

class AppForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var BootstrapTextBox
     */
    private $appLabel;

    /**
     * @var BootstrapTextBox
     */
    private $appName;

    /**
     * @var BootstrapTextBox
     */
    private $appNamespace;

    public function getContent()
    {

        $namespacePrefix = $this->project->namespace . '\\App\\';

        $this->appLabel = new BootstrapTextBox($this);
        $this->appLabel->name = 'app_label';
        $this->appLabel->label = 'App Label';
        $this->appLabel->validation = true;
        $this->appLabel->autofocus = true;

        $this->appName = new BootstrapTextBox($this);
        $this->appName->name = 'app_name';
        $this->appName->label = 'App Name';
        $this->appName->validation = true;

        $this->appNamespace = new BootstrapTextBox($this);
        $this->appNamespace->name = 'app_namespace';
        $this->appNamespace->label = 'App Namespace';
        $this->appNamespace->validation = true;
        $this->appNamespace->value = $namespacePrefix;

        if ($this->app !== null) {
            $this->appLabel->value = $this->app->appLabel;
            $this->appName->value = $this->app->appName;
            $this->appNamespace->value = $this->app->namespace;

            $this->appName->disabled = true;
            $this->appName->validation = false;
        }

        $this->addJqueryScript('$("#' . $this->appLabel->name . '").keypress(function(e) { if(e.which === 32) return false; });');

        $this->addJqueryScript('$("#' . $this->appLabel->name . '").keyup(function() {');
        $this->addJqueryScript('$("#' . $this->appLabel->name . '" ).val($("#' . $this->appLabel->name . '" ).val().replace(" ", ""));');
        $this->addJqueryScript('value = $("#' . $this->appLabel->name . '" ).val();');
        $this->addJqueryScript('prefix = value.toLowerCase().replace(" ", "_");');
        //$this->addJqueryScript('prefix = p.replace(" ", "_");');

        // ö, ä, ü etc. plus alle ersetzen (muss mit regex gelöst werden
        // https://www.w3schools.com/jsref/jsref_replace.asp
        // / /g

        //$this->addJqueryScript('namespace = "' . AppDesignerConfig::$defaultProject->namespace . '\\Admin\\' . '" + value.replace(" ", "");');

        $this->addJqueryScript('namespace = "' . (new Text($namespacePrefix))->replace('\\', '\\\\')->getValue() . '" + value.replace(" ", "");');
        $this->addJqueryScript('$("#' . $this->appName->name . '" ).val(prefix);');
        $this->addJqueryScript('$("#' . $this->appNamespace->name . '" ).val(namespace);');
        $this->addJqueryScript('});');

        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = parent::onValidate();

        if ($this->app == null) {
            $projectJson = new ProjectJson($this->project);
            foreach ($projectJson->getAppJsonList() as $app) {

                if ($app->appName == $this->appName->getValue()) {
                    $this->appName->showErrorMessage = true;
                    $this->appName->errorMessage = 'App Name already in use';
                    $returnValue = false;
                }

                if ($app->namespace == $this->appNamespace->getValue()) {
                    $this->appNamespace->showErrorMessage = true;
                    $this->appNamespace->errorMessage = 'Namespace already in use';
                    $returnValue = false;
                }

            }

        }

        return $returnValue;

    }


    protected function onSubmit()
    {

        $appName = $this->appLabel->getValue();
        $appPrefix = $this->appName->getValue();

        if ($this->app == null) {

            $app = new AppJson();
            $app->fromProject($this->project, $appPrefix);
            $app->appLabel = $appName;
            $app->appName = $appPrefix;
            $app->namespace = $this->appNamespace->getValue();
            $app->writeJson();

            $applicationClassName = $app->appLabel . 'Application';

            $phpClass = new PhpClass();
            $phpClass->project = $this->project;
            $phpClass->className = $app->appLabel . 'Install';
            $phpClass->extendsFromClass = 'AbstractInstall';
            $phpClass->namespace = $app->namespace . '\Install';
            $phpClass->addUseClass(AbstractInstall::class);
            $phpClass->addUseClass(ModelCollectionSetup::class);
            $phpClass->addUseClass($app->namespace . '\\Data\\' . $app->appLabel . 'ModelCollection');
            $phpClass->addUseClass($app->namespace . '\\Application\\' . $app->appLabel . 'Application');
            $phpClass->addUseClass(ApplicationSetup::class);

            $function = new PhpFunction($phpClass);
            $function->functionName = 'install()';
            $function->add('(new ApplicationSetup())->addApplication(new ' . $applicationClassName . '());');
            $function->add('(new ModelCollectionSetup())->addCollection(new ' . $app->appLabel . 'ModelCollection());');

            $phpClass->saveFile();


            $phpClass = new PhpClass();
            $phpClass->project = $this->project;
            $phpClass->className = $app->appLabel . 'Uninstall';
            $phpClass->extendsFromClass = 'AbstractUninstall';
            $phpClass->namespace = $app->namespace . '\Install';
            $phpClass->addUseClass(AbstractUninstall::class);
            $phpClass->addUseClass(ModelCollectionSetup::class);
            $phpClass->addUseClass($app->namespace . '\\Data\\' . $app->appLabel . 'ModelCollection');
            $phpClass->addUseClass($app->namespace . '\\Application\\' . $app->appLabel . 'Application');
            $phpClass->addUseClass(ApplicationSetup::class);

            $function = new PhpFunction($phpClass);
            $function->functionName = 'uninstall()';
            $function->add('(new ModelCollectionSetup())->removeCollection(new ' . $app->appLabel . 'ModelCollection());');

            $phpClass->saveFile();


            $builder = new ApplicationClassBuilder();
            $builder->project = $this->project;
            $builder->className = $app->appLabel;
            $builder->namespace = $app->namespace;
            $builder->buildClass();

        } else {

            $this->app->appLabel = $appName;
            $this->app->namespace = $this->appNamespace->getValue();
            $this->app->writeJson();

        }

        $this->redirectSite->addParameter(new ProjectParameter());
        $this->redirectSite->addParameter(new AppParameter($appPrefix));

    }

}