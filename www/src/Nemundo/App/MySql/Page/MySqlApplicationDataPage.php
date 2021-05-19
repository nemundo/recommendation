<?php

namespace Nemundo\App\MySql\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\App\MySql\Site\Action\MySqlIndexDeleteSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Model\Factory\ModelCollectionFactory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Url\UrlBuilder;


// nach Application ???

class MySqlApplicationDataPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->value = $applicationListBox->getValue();
        $applicationListBox->column=true;
        $applicationListBox->columnSize=2;

        if ($applicationListBox->hasValue()) {

            $applicationRow = (new ApplicationReader())->getRowById($applicationListBox->getValue());
            $application = $applicationRow->getApplication();

            if ($application->modelCollectionClass !== null) {

                $row = new BootstrapRow($this);

                $col1 = new BootstrapColumn($row);
                $col1->columnWidth = 3;

                $col2 = new BootstrapColumn($row);
                $col2->columnWidth = 3;

                $listbox = new BootstrapHyperlinkList($col1);

                $collection = (new ModelCollectionFactory())->getModelCollectionByClassName($application->modelCollectionClass);
                foreach ($collection->getModelList() as $model) {

                    $url = new UrlBuilder();
                    $url->addParameter((new TableParameter($model->tableName)));

                    $listbox->addHyperlink($model->tableName, $url->getUrl());

                }

                $tableParameter = new TableParameter();
                if ($tableParameter->exists()) {

                    $tableName = $tableParameter->getValue();

                    $title = new H2($col2);
                    $title->content = $tableName;

                    $table = new MySqlTable($tableName);

                    if ($table->existsTable()) {

                        $count = new DataCount();
                        $count->tableName = $tableName;

                        $p = new Paragraph($col2);
                        $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

                        $btn = new AdminSiteButton($col2);
                        $btn->site = clone(EmptyTableSite::$site);
                        $btn->site->addParameter($tableParameter);

                        $btn = new AdminSiteButton($col2);
                        $btn->site = clone(DropTableSite::$site);
                        $btn->site->addParameter($tableParameter);

                        $btn = new AdminSiteButton($col2);
                        $btn->site = clone(MySqlIndexDeleteSite::$site);
                        $btn->site->addParameter($tableParameter);

                        $data = new MySqlDataTable($col2);
                        $data->tableName = $tableName;
                        $data->limit = 50;

                    } else {
                        $p = new Paragraph($col2);
                        $p->content = 'Table does not exist';
                    }

                }

            }

        }

        return parent::getContent();

    }

}