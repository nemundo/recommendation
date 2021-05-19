<?php

namespace Nemundo\App\ModelDesigner\Site;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Dropdown\TypeDropdown;
use Nemundo\App\ModelDesigner\Com\Table\IndexTable;
use Nemundo\App\ModelDesigner\Com\Table\ModelTypeTable;
use Nemundo\App\ModelDesigner\Page\ModelPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Data\DataSite;
use Nemundo\App\ModelDesigner\Site\Image\ImageTypeSite;
use Nemundo\App\ModelDesigner\Site\Index\IndexDeleteSite;
use Nemundo\App\ModelDesigner\Site\Index\IndexNewSite;
use Nemundo\App\ModelDesigner\Site\Index\IndexSite;
use Nemundo\App\ModelDesigner\Site\Json\ModelTypeJsonSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelEditSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelUndoDeleteSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeDeleteSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeEditSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeNewSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeSortableSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeUndoDeleteSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class ModelSite extends AbstractSite
{

    /**
     * @var ModelSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'model';
        $this->menuActive = false;

        new ModelUndoDeleteSite($this);

        new TypeNewSite($this);
        new TypeEditSite($this);
        new TypeDeleteSite($this);
        new TypeUndoDeleteSite($this);

        new IndexSite($this);
        new IndexNewSite($this);
        new IndexDeleteSite($this);

        new ImageTypeSite($this);

        new DataSite($this);

        new TypeSortableSite($this);
        new ModelTypeJsonSite($this);


        new ClassDesignerSite($this);

        ModelSite::$site = $this;

    }

    public function loadContent()
    {

        (new ModelPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $model = $app->getModelByTableName((new ModelParameter())->getValue());

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addActiveItem($model->className);

        $btn = new AdminIconSiteButton();
        $btn->site = ModelEditSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter($model->tableName));

        $title = new AdminTitle($page);
        $title->content = $model->label . ' ' . $btn->getBodyContent();

        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('Template', $model->templateLabel);
        $table->addLabelValue('Label', $model->label);
        $table->addLabelValue('Class Name', $model->className);
        $table->addLabelValue('Table Name', $model->tableName);
        $table->addLabelValue('Namespace', $model->namespace);
        $table->addLabelValue('Row Class Name', $model->rowClassName);
        $table->addLabelValue('Primary Index', $model->primaryIndex->primaryIndexLabel);

        $btn = new AdminSiteButton($page);
        $btn->site = DataSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter());

        new TypeDropdown($page);

        $table = new ModelTypeTable($page);
        $table->model = $model;


        // Show Deleted

        $subtitle = new AdminSubtitle($page);
        $subtitle->content = 'Index';

        $btn = new AdminSiteButton($page);
        $btn->site = IndexNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter());

        $table = new IndexTable($page);
        $table->model = $model;

        $page->render();*/

    }

}