<?php

namespace Nemundo\App\SqLite\Site\Action;


use Nemundo\App\SqLite\Connection\FilenameConnection;
use Nemundo\App\SqLite\Parameter\TableParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Db\Delete\DataDelete;
use Nemundo\Web\Site\AbstractSite;

class EmptyTableSite extends AbstractSite
{

    /**
     * @var EmptyTableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Empty Table';
        $this->url = 'SqLite-empty-table';
        $this->menuActive = false;

        EmptyTableSite::$site = $this;

    }


    public function loadContent()
    {

        $tableParameter = new TableParameter();

        $table = new DataDelete();
        $table->connection=new FilenameConnection();
        $table->tableName = $tableParameter->getValue();
        $table->delete();

        (new UrlReferer())->redirect();

    }

}