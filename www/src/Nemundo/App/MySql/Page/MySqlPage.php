<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\MySql\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Com\Table\MySqlIndexTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Com\Table\MySqlTableTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\App\MySql\Site\MySqlTableSite;
use Nemundo\App\MySql\Template\MySqlTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class MySqlPage extends MySqlTemplate
{

    public function getContent()
    {


        //new MySqlTableTable($this);

        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header=new AdminTableHeader($table);
        $header->addText('Table Name');
        $header->addText('Collation');
        $header->addText('Engine');
        $header->addText('Rows');

        $reader = new SqlReader();
        $reader->sqlStatement->sql= 'SELECT * FROM information_schema.tables WHERE table_schema = "'.DbConfig::$defaultConnection->connectionParameter->database.'" ORDER BY TABLE_NAME';
        foreach ($reader->getData() as $dataRow) {

            $tableName = $dataRow->getValue('TABLE_NAME');

            $row=new AdminClickableTableRow($table);
            $row->addText($tableName);
            $row->addText($dataRow->getValue('TABLE_COLLATION'));
            $row->addText($dataRow->getValue('ENGINE'));


            $rowCount = $dataRow->getValue('TABLE_ROWS');

            $row->addText((new Number($rowCount))->formatNumber());

            $site = clone(MySqlTableSite::$site);
            $site->addParameter(new TableParameter($tableName));
            $row->addClickableSite($site);

        }





        /*
        $layout=new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 3;
        $layout->col2->columnWidth= 9;


        $widget=new AdminWidget($layout->col1);
        $widget->widgetTitle='Search';

        $form = new SearchForm($widget);

        $formRow = new BootstrapRow($form);

        $table = new MySqlTableListBox($formRow);
        $table->submitOnChange = true;
        $table->searchMode = true;

        if ($table->hasValue()) {

            $widget=new AdminWidget($layout->col1);
            $widget->widgetTitle = 'Field';

            $data = new MySqlTableFieldTable($widget);
            $data->tableName = $table->getValue();


            $widget=new AdminWidget($layout->col1);
            $widget->widgetTitle = 'Index';

            $data = new MySqlIndexTable($widget);
            $data->tableName = $table->getValue();


            $widget=new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Data';

            $btn = new AdminSiteButton($widget);
            $btn->site = clone(EmptyTableSite::$site);
            $btn->site->addParameter(new TableParameter());

            $btn = new AdminSiteButton($widget);
            $btn->site = clone(DropTableSite::$site);
            $btn->site->addParameter(new TableParameter());

            $data = new MySqlDataTable($widget);
            $data->tableName = $table->getValue();

        }
*/



        return parent::getContent();
    }
}