<?php

namespace Nemundo\App\SqLite\Site\Action;


use Nemundo\App\SqLite\Connection\FilenameConnection;
use Nemundo\App\SqLite\Parameter\TableParameter;
use Nemundo\App\SqLite\Site\SqLiteSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Db\Provider\SqLite\Table\SqLiteTable;
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

        $table = new SqLiteTable();
        $table->connection=new FilenameConnection();
        $table->tableName = $tableParameter->getValue();
        $table->dropTable();

        $site=clone(SqLiteSite::$site);
        $site->redirect();
        //(new UrlReferer())->redirect();

    }

}