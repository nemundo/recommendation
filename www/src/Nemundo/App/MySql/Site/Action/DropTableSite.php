<?php

namespace Nemundo\App\MySql\Site\Action;


use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class DropTableSite extends AbstractIconSite
{

    /**
     * @var DropTableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Drop Table';
        $this->url = 'drop-table';
        $this->icon = new DeleteIcon();
        $this->menuActive = false;

        DropTableSite::$site = $this;

    }


    public function loadContent()
    {

        $tableParameter = new TableParameter();

        $table = new MySqlTable();
        $table->tableName = $tableParameter->getValue();
        $table->dropTable();

        (new UrlReferer())->redirect();

    }

}