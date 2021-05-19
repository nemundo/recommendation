<?php

namespace Nemundo\App\ModelDesigner\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\App\AppDeleteSite;
use Nemundo\App\ModelDesigner\Site\App\AppEditSite;
use Nemundo\App\ModelDesigner\Site\App\AppUndoDeleteSite;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Form;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class AppTable extends AbstractHtmlContainer
{


    public function getContent()
    {


        $form = new Form($this);  // new SearchForm($this);
        $form->action = (new Site())->getUrl();
        $form->formMethod = FormMethod::POST;

        $formRow = new BootstrapRow($form);
        $listbox = new BootstrapListBox($formRow);
        $listbox->emptyValueAsDefault = false;
        //$listbox->searchItem = true;

        $listbox->submitOnChange = true;

        $listbox->value = $listbox->getValue();

        $listbox->addItem(0, 'Aktive[Default]');
        //$listbox->addItem(1, 'Alle');
        $listbox->addItem(1, 'Gelöschte');


        // ShowAll
        // ShowActive
        // ShowInactive /ShowDeleted

        $hideDeleteItems = true;

        if ($listbox->getValue() == 1) {
            $hideDeleteItems=false;
        }

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('App');
        $header->addText('Name');
        $header->addText('Namespace');
        $header->addEmpty();
        $header->addEmpty();

        $project = new ProjectJson((new ProjectParameter())->getProject());

        foreach ($project->getAppJsonList($hideDeleteItems) as $appJson) {

            $row = new BootstrapClickableTableRow($table);
            $row->strikeThrough=$appJson->isDeleted;
            $row->addText($appJson->appLabel);
            $row->addText($appJson->appName);
            $row->addText($appJson->namespace);

            $site = clone(AppEditSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter($appJson->appName));
            $row->addIconSite($site);

            if ($appJson->isDeleted) {
                $site = clone(AppUndoDeleteSite::$site);
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new AppParameter($appJson->appName));
                $row->addIconSite($site);
            } else {
                $site = clone(AppDeleteSite::$site);
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new AppParameter($appJson->appName));
                $row->addIconSite($site);
            }

            $site = clone(AppSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter($appJson->appName));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}