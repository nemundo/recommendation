<?php

namespace Nemundo\App\MySql\Site\Action;


use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Db\Provider\MySql\Index\Drop\MySqlTableIndexDrop;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSite;

class MySqlIndexDeleteSite extends AbstractSite
{

    /**
     * @var MySqlIndexDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Index';
        $this->url = 'delete-index';
        $this->menuActive = false;

        MySqlIndexDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $tableName = (new TableParameter())->getValue();

        $table = new MySqlTableIndexDrop($tableName);
        $table->dropAllIndex();

        (new UrlReferer())->redirect();

    }

}