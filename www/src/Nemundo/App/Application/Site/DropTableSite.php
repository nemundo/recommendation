<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class DropTableSite extends AbstractSite
{

    /**
     * @var DropTableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Drop Table';
        $this->url = 'drop-table';

        DropTableSite::$site = $this;

    }


    public function loadContent()
    {

        $table = new MySqlTable();
        $table->tableName = (new ModelParameter())->getValue();
        $table->dropTable();

        (new UrlReferer())->redirect();

    }

}