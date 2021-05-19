<?php


namespace Nemundo\App\ModelDesigner\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Dropdown\TypeDropdown;
use Nemundo\App\ModelDesigner\Com\Table\IndexTable;
use Nemundo\App\ModelDesigner\Com\Table\ModelTypeTable;
use Nemundo\App\ModelDesigner\Com\Table\ProjectTable;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Data\DataSite;
use Nemundo\App\ModelDesigner\Site\Index\IndexNewSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelEditSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;

class ModelPage extends ModelDesignerTemplate
{

    public function getContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $model = $app->getModelByTableName((new ModelParameter())->getValue());

        $breadcrumb = new ModelDesignerBreadcrumb($this);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addActiveItem($model->className);

        $btn = new AdminIconSiteButton();
        $btn->site = ModelEditSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter($model->tableName));

        $title = new AdminTitle($this);
        $title->content = $model->label . ' ' . $btn->getBodyContent();

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Template', $model->templateLabel);
        $table->addLabelValue('Label', $model->label);
        $table->addLabelValue('Class Name', $model->className);
        $table->addLabelValue('Table Name', $model->tableName);
        $table->addLabelValue('Namespace', $model->namespace);
        $table->addLabelValue('Row Class Name', $model->rowClassName);
        $table->addLabelValue('Primary Index', $model->primaryIndex->primaryIndexLabel);

        $btn = new AdminSiteButton($this);
        $btn->site = DataSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter());

        new TypeDropdown($this);

        $table = new ModelTypeTable($this);
        $table->model = $model;


        // Show Deleted

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = 'Index';

        $btn = new AdminSiteButton($this);
        $btn->site = IndexNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter());

        $table = new IndexTable($this);
        $table->model = $model;

        return parent::getContent();

    }


}