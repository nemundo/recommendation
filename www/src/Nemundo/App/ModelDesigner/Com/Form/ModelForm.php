<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\App\ModelDesigner\Com\ListBox\ModelTemplateListBox;
use Nemundo\App\ModelDesigner\Com\ListBox\PrimaryIndexListBox;
use Nemundo\App\ModelDesigner\Jquery\DisableSpaceKeyJquery;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Model\ModelDesignerOrmModel;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\Template\DefaultOrmModel;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Jquery\Event\ChangeJqueryEvent;
use Nemundo\User\Orm\UserOrmModel;

class ModelForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var ModelDesignerOrmModel
     */
    public $model;

    /**
     * @var ModelTemplateListBox
     */
    private $modelTemplate;

    /**
     * @var BootstrapTextBox
     */
    private $modelLabel;

    /**
     * @var BootstrapTextBox
     */
    private $modelClassName;

    /**
     * @var BootstrapTextBox
     */
    private $modelTableName;

    /**
     * @var BootstrapTextBox
     */
    private $modelNamespace;

    /**
     * @var BootstrapTextBox
     */
    private $modelRowClassName;

    /**
     * @var PrimaryIndexListBox
     */
    private $modelPrimaryIndex;

    public function getContent()
    {

        $tableNamePrefix = $this->app->appName . '_';
        $namespacePrefix = $this->app->namespace . '\\Data\\';

        $this->modelTemplate = new ModelTemplateListBox($this);
        $this->modelTemplate->name = 'template';

        $this->modelLabel = new BootstrapTextBox($this);
        $this->modelLabel->label = 'Label';
        $this->modelLabel->name = 'label';
        $this->modelLabel->validation = true;

        $this->modelClassName = new BootstrapTextBox($this);
        $this->modelClassName->label = 'Class Name';
        $this->modelClassName->name = 'class_name';
        $this->modelClassName->validation = true;

        $this->modelTableName = new BootstrapTextBox($this);
        $this->modelTableName->label = 'Table Name';
        $this->modelTableName->name = 'table_name';
        $this->modelTableName->validation = true;
        $this->modelTableName->value = $tableNamePrefix;

        $this->modelNamespace = new BootstrapTextBox($this);
        $this->modelNamespace->label = 'Namespace';
        $this->modelNamespace->name = 'namespace';
        $this->modelNamespace->validation = true;
        $this->modelNamespace->value = $namespacePrefix;

        $this->modelRowClassName = new BootstrapTextBox($this);
        $this->modelRowClassName->label = 'Row Class Name';

        $this->modelPrimaryIndex = new PrimaryIndexListBox($this);
        $this->modelPrimaryIndex->name = 'primary_index';

        if ($this->model !== null) {

            $this->modelTemplate->value = $this->model->templateName;
            $this->modelLabel->value = $this->model->label;
            $this->modelClassName->value = $this->model->className;
            $this->modelTableName->value = $this->model->tableName;
            $this->modelNamespace->value = $this->model->namespace;
            $this->modelRowClassName->value = $this->model->rowClassName;
            $this->modelPrimaryIndex->value = $this->model->primaryIndex->primaryIndexName;

        }

        $this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->modelClassName->name));
        $this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->modelTableName->name));
        $this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->modelNamespace->name));

        if ($this->model == null) {

            $this->modelTemplate->value = (new DefaultOrmModel())->templateName;

            $event = new ChangeJqueryEvent();
            $event->eventId = $this->modelTemplate->name;

            $userTableName = (new UserOrmModel())->tableName;

            $event->addCodeLine('if ($("#' . $this->modelTemplate->name . '" ).val() == "' . (new UserOrmModel())->templateName . '") {');
            $event->addCodeLine('$("#' . $this->modelTableName->name . '").prop("readonly", true);');
            $event->addCodeLine('$("#' . $this->modelPrimaryIndex->name . '").prop("readonly", true);');
            $event->addCodeLine('$("#' . $this->modelTableName->name . '").val("' . $userTableName . '");');
            $event->addCodeLine('$("#' . $this->modelPrimaryIndex->name . '").val("' . (new UniqueIdPrimaryIndex())->primaryIndexName . '");');
            $event->addCodeLine('} else {');
            $event->addCodeLine('$("#' . $this->modelTableName->name . '").prop("readonly", false);');
            $event->addCodeLine('$("#' . $this->modelPrimaryIndex->name . '").prop("readonly", false);');
            $event->addCodeLine('$("#' . $this->modelTableName->name . '").val("");');
            $event->addCodeLine('}');
            $this->addJqueryCode($event);

            $this->addJqueryScript('$("#' . $this->modelLabel->name . '").keyup(function() {');
            $this->addJqueryScript('value = $("#' . $this->modelLabel->name . '" ).val();');

            $this->addJqueryScript('value = value.replace(/Ä/g, "Ae");');
            $this->addJqueryScript('value = value.replace(/Ö/g, "Oe");');
            $this->addJqueryScript('value = value.replace(/Ü/g, "Ue");');
            $this->addJqueryScript('value = value.replace(/ä/g, "ae");');
            $this->addJqueryScript('value = value.replace(/ö/g, "oe");');
            $this->addJqueryScript('value = value.replace(/ü/g, "ue");');
            $this->addJqueryScript('value = value.replace(/é/g, "e");');


            $this->addJqueryScript('className = value.replace(/ /g, "");');
            $this->addJqueryScript('tableName = "' . $tableNamePrefix . '" + value.toLowerCase().replace(/ /g, "_");');
            $this->addJqueryScript('className = value.replace(/ /g, "");');
            $this->addJqueryScript('namespace = "' . (new Text($namespacePrefix))->replace('\\', '\\\\')->getValue() . '" + value.replace(/ /g, "");');
            $this->addJqueryScript('$("#' . $this->modelClassName->name . '" ).val(className);');

            $this->addJqueryScript('if ($("#' . $this->modelTableName->name . '" ).val() != "' . $userTableName . '") {');
            $this->addJqueryScript('$("#' . $this->modelTableName->name . '" ).val(tableName);');
            $this->addJqueryScript('}');

            $this->addJqueryScript('$("#' . $this->modelNamespace->name . '" ).val(namespace);');
            $this->addJqueryScript('});');

        }

        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = parent::onValidate();

        if ($this->model == null) {
            foreach ($this->app->getModelList() as $model) {

                if ($model->tableName == $this->modelTableName->getValue()) {
                    $this->modelTableName->showErrorMessage = true;
                    $this->modelTableName->errorMessage = 'Table Name already in use';
                    $returnValue = false;
                }

                if ($model->namespace == $this->modelNamespace->getValue()) {
                    $this->modelNamespace->showErrorMessage = true;
                    $this->modelNamespace->errorMessage = 'Namespace already in use';
                    $returnValue = false;
                }

            }
        }

        return $returnValue;

    }


    protected function onSubmit()
    {

        $tableName = $this->modelTableName->getValue();

        if ($this->model == null) {

            $model = new ModelDesignerOrmModel();
            $model->templateName = $this->modelTemplate->getValue();
            $model->modelId = (new UniqueId())->getUniqueId();
            $model->label = $this->modelLabel->getValue();
            $model->className = $this->modelClassName->getValue();
            $model->tableName = $tableName;
            $model->namespace = $this->modelNamespace->getValue();
            $model->rowClassName = $this->modelRowClassName->getValue();
            $model->primaryIndex = $this->modelPrimaryIndex->getPrimaryIndex();
            $this->app->addModel($model);

        } else {

            $this->model->templateName = $this->modelTemplate->getValue();
            $this->model->label = $this->modelLabel->getValue();
            $this->model->className = $this->modelClassName->getValue();
            $this->model->tableName = $tableName;
            $this->model->namespace = $this->modelNamespace->getValue();
            $this->model->rowClassName = $this->modelRowClassName->getValue();
            $this->model->primaryIndex = $this->modelPrimaryIndex->getPrimaryIndex();

        }

        $this->app->writeJson();

        $this->redirectSite->addParameter(new ModelParameter($tableName));

    }

}