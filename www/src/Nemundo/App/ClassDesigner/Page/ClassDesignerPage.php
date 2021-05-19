<?php


namespace Nemundo\App\ClassDesigner\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\ClassDesigner\ApplicationClassBuilderForm;
use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;
use Nemundo\App\ClassDesigner\ClassDesignerConfig;
use Nemundo\App\ClassDesigner\Designer\ListBox\ListBoxClassBuilderForm;
use Nemundo\App\ClassDesigner\Designer\Parameter\ParameterClassBuilderForm;
use Nemundo\App\ClassDesigner\Designer\Site\SiteClassBuilderForm;
use Nemundo\App\ClassDesigner\Designer\Usergroup\UsergroupClassBuilderForm;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\ModelDesigner\Com\ListBox\ProjectListBox;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;
use Nemundo\App\Scheduler\ClassDesigner\SchedulerClassBuilderForm;
use Nemundo\App\Script\ClassDesigner\ScriptClassBuilderForm;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;

class ClassDesignerPage extends ModelDesignerTemplate  // AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 3;
        $layout->col2->columnWidth = 9;

        $form = new SearchForm($layout->col1);

        $projectListBox = new ProjectListBox($form);
        $projectListBox->searchMode = true;
        $projectListBox->submitOnChange = true;

        $projectParameter = new ProjectParameter();
        if ($projectParameter->hasValue()) {

            $project = $projectListBox->getProject();
            $projectJson = new ProjectJson($project);

            $hyperlinkList = new BootstrapSiteList($layout->col1);

            foreach ($projectJson->getAppJsonList(true) as $appJson) {

                if ((new AppParameter())->getValue() == $appJson->appName) {
                    $hyperlinkList->addActiveText($appJson->appLabel);
                } else {
                    $site = clone(ClassDesignerSite::$site);
                    $site->title = $appJson->appLabel;
                    $site->addParameter(new ProjectParameter());
                    $site->addParameter(new AppParameter($appJson->appName));
                    $hyperlinkList->addSite($site);
                }

            }

            $appParamter = new AppParameter();
            if ($appParamter->hasValue()) {

                $app = $appParamter->getApp($project);

                $title = new AdminTitle($layout->col2);
                $title->content = $app->appLabel;

                /** @var AbstractClassBuilderForm[] $list */
                ClassDesignerConfig::$classBuilderFormList[] = new SiteClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new ParameterClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new UsergroupClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new SchedulerClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new ScriptClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new ListBoxClassBuilderForm();
                ClassDesignerConfig::$classBuilderFormList[] = new ApplicationClassBuilderForm();

                foreach (ClassDesignerConfig::$classBuilderFormList as $form) {

                    $widget = new AdminWidget($layout->col2);
                    $widget->widgetTitle = $form->formTitle;
                    $widget->addContainer($form);

                    $form->project = $project;
                    $form->app = $app;
                    $form->redirectSite = ClassDesignerSite::$site;
                    $form->redirectSite->addParameter(new ProjectParameter());
                    $form->redirectSite->addParameter(new AppParameter());

                }

            }

        }

        return parent::getContent();

    }

}