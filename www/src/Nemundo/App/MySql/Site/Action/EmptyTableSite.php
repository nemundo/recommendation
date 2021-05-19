<?php

namespace Nemundo\App\MySql\Site\Action;


use Nemundo\App\MySql\Parameter\TableParameter;
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
        $this->url = 'empty-table';
        $this->menuActive = false;

        EmptyTableSite::$site = $this;

    }


    public function loadContent()
    {

        $tableParameter = new TableParameter();

        $table = new DataDelete();
        $table->tableName = $tableParameter->getValue();
        $table->delete();

        (new UrlReferer())->redirect();


    }


}