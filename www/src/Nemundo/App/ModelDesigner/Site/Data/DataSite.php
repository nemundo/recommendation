<?php

namespace Nemundo\App\ModelDesigner\Site\Data;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Web\Site\AbstractSite;

class DataSite extends AbstractSite
{

    /**
     * @var DataSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Data';
        $this->url = 'model-data';
        $this->menuActive = false;

        new DataEmptySite($this);
        new DropDataSite($this);

        DataSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem('Data');


        $title = new AdminTitle($page);
        $title->content = $model->tableName;


        $table = new MySqlTable($model->tableName);
        if ($table->existsTable()) {

            $btn = new AdminSiteButton($page);
            $btn->site = DataEmptySite::$site;
            $btn->site->addParameter(new ProjectParameter());
            $btn->site->addParameter(new AppParameter());
            $btn->site->addParameter(new ModelParameter());

            $btn = new AdminSiteButton($page);
            $btn->site = DropDataSite::$site;
            $btn->site->addParameter(new ProjectParameter());
            $btn->site->addParameter(new AppParameter());
            $btn->site->addParameter(new ModelParameter());


            $count = new DataCount();
            $count->tableName = $model->tableName;
            $p = new Paragraph($page);
            $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

            $data = new MySqlDataTable($page);
            $data->tableName = $model->tableName;
            $data->limit = 100;



        } else {

            $p = new Paragraph($page);
            $p->content = 'Table does not exist';

        }



        /*
        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $page = new AdminTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);
        $breadcrumb->addActiveItem('Data');

        $btn = new AdminSiteButton($page);
        //$btn->content = 'Empty Data';
        $btn->site = AppModelDataEmptySite::$site;
        $btn->site->addParameter(new ModelParameter($modelRow->id));


        $table = new MySqlTable($modelRow->modelTableName);
        if ($table->existsTable()) {

            $count = new DataCount();
            $count->tableName = $modelRow->modelTableName;
            $p = new Paragraph($page);
            $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

            $data = new MySqlDataTable($page);
            $data->tableName = $modelRow->modelTableName;
            $data->limit = 100;

        } else {

            $p = new Paragraph($page);
            $p->content = 'Table does not exist';

        }*/

        $page->render();

    }

}