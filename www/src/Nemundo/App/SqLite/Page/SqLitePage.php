<?php


namespace Nemundo\App\SqLite\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\SqLite\Cookie\FilenameCookie;
use Nemundo\App\SqLite\Site\Action\DropTableSite;
use Nemundo\App\SqLite\Site\Action\EmptyTableSite;
use Nemundo\App\SqLite\Com\ListBox\SqLiteTableListBox;
use Nemundo\App\SqLite\Com\Table\SqLiteDataTable;
use Nemundo\App\SqLite\Connection\FilenameConnection;
use Nemundo\App\SqLite\Parameter\TableParameter;
use Nemundo\App\SqLite\SqLiteConfig;
use Nemundo\App\SqLite\Template\SqLiteTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class SqLitePage extends SqLiteTemplate
{

    public function getContent()
    {

        $table=new AdminLabelValueTable($this);
        $table->addLabelValue('Filename',(new FilenameCookie())->getValue());


        $connection = new FilenameConnection();

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $list = new SqLiteTableListBox($formRow);
        $list->connection = $connection;
        $list->submitOnChange = true;


        $tableName = $list->getValue();
        if ($tableName !== '') {

            $div = new Div($this);

            $tableParameter = new TableParameter($tableName);

            $btn = new AdminSiteButton($div);
            $btn->site = clone(EmptyTableSite::$site);
            $btn->site->addParameter($tableParameter);

            $btn = new AdminSiteButton($div);
            $btn->site = clone(DropTableSite::$site);
            $btn->site->addParameter($tableParameter);

            $data = new SqLiteDataTable($this);
            $data->connection = $connection;
            $data->tableName = $tableName;

        }


        return parent::getContent();

    }

}