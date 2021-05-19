<?php


namespace Nemundo\App\Application\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ListBox\ProjectListBox;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Parameter\ProjectParameter;
use Nemundo\App\Application\Site\Action\PackageInstallSite;
use Nemundo\App\Application\Site\ApplicationEditSite;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Application\Site\ClearSite;
use Nemundo\App\Application\Site\InstallSite;
use Nemundo\App\Application\Site\ReinstallSite;
use Nemundo\App\Application\Site\UninstallSite;
use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\App\Script\Com\Table\ScriptTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ApplicationPage extends ApplicationTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $form = new SearchForm($layout->col1);

        $formRow = new BootstrapRow($form);

        $project = new ProjectListBox($formRow);
        $project->submitOnChange = true;
        $project->searchMode = true;
        $project->column = true;
        $project->columnSize = 3;

        $install=new BootstrapCheckBox($formRow);
        $install->label='Installed App';
        $install->submitOnChange=true;
        $install->searchMode=true;

        $btn = new AdminIconSiteButton($formRow);
        $btn->site = ClearSite::$site;

        $table = new AdminClickableTable($layout->col1);

        $applicationReader = new ApplicationReader();
        $applicationReader->model->loadProject();

        if ($project->hasValue()) {
            $applicationReader->filter->andEqual($applicationReader->model->projectId, $project->getValue());
        }

        if ($install->hasValue()) {
            $applicationReader->filter->andEqual($applicationReader->model->install,true);
        }



        $applicationReader->addOrder($applicationReader->model->application);

        $header = new AdminTableHeader($table);

        $header->addText($applicationReader->model->application->label);
        $header->addText($applicationReader->model->install->label);
        $header->addText($applicationReader->model->appMenu->label);
        $header->addText($applicationReader->model->adminMenu->label);
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();
        $header->addText($applicationReader->model->project->label);
        $header->addText('Package');
        $header->addText('Dependecy (application)');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        foreach ($applicationReader->getData() as $applicationRow) {

            $row = new AdminClickableTableRow($table);

            $row->addText($applicationRow->application);
            $row->addYesNo($applicationRow->install);
            $row->addYesNo($applicationRow->appMenu);
            $row->addYesNo($applicationRow->adminMenu);

            $app = $applicationRow->getApplication();

            if ($app !== null) {

                if ($app->hasInstall()) {
                    $site = clone(InstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);


                } else {
                    $row->addEmpty();
                }

                if ($app->hasUninstall()) {
                    $site = clone(UninstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);
                } else {
                    $row->addEmpty();
                }

                if ($app->hasInstall() && ($app->hasUninstall())) {
                    $site = clone(ReinstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);

                } else {
                    $row->addEmpty();
                }

                $row->addText($applicationRow->project->project);


                if ($app->hasPackage()) {

                    $ul = new UnorderedList($row);
                    foreach ($app->getPackageList() as $package) {
                        $ul->addText($package->packageName);
                    }

                    $site = clone(PackageInstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);

                } else {

                    $row->addEmpty();
                    $row->addEmpty();

                }


                $row->addText('');


            } else {
                $row->addText('No Class');
            }

            $site = clone(ApplicationEditSite::$site);
            $site->addParameter(new ApplicationParameter($applicationRow->id));
            $row->addIconSite($site);

            $site = clone(ApplicationSite::$site);
            $site->addParameter(new ApplicationParameter($applicationRow->id));
            $site->addParameter(new ProjectParameter());
            $row->addClickableSite($site);

        }


        $parameter = new ApplicationParameter();
        if ($parameter->hasValue()) {

            $applicationId = $parameter->getValue();

            $applicationRow = (new ApplicationReader())->getRowById($applicationId);

            $title = new AdminTitle($layout->col2);
            $title->content = $applicationRow->application;


            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Scheduler';

            $table = new SchedulerTable($widget);
            $table->filterByApplicationId($applicationId);

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Script';

            $table = new ScriptTable($widget);
            $table->filterByApplicationId($applicationId);


        }

        return parent::getContent();

    }

}