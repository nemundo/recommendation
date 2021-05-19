<?php

namespace Nemundo\App\ModelDesigner\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Model\ModelDeleteSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelEditSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelUndoDeleteSite;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ModelTable extends AdminClickableTable
{

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var bool
     */
    public $hideDeletedItems = true;

    public function getContent()
    {

        $header = new AdminTableHeader($this);
        $header->addText('Label');
        $header->addText('Class Name');
        $header->addText('Table Name');
        $header->addText('Namespace');
        $header->addText('Template');
        $header->addEmpty();
        $header->addEmpty();

        foreach ($this->app->getModelList($this->hideDeletedItems) as $model) {

            $row = new BootstrapClickableTableRow($this);
            $row->strikeThrough = $model->isDeleted;
            $row->addText($model->label);
            $row->addText($model->className);
            $row->addText($model->tableName);
            $row->addText($model->namespace);
            $row->addText($model->templateLabel);

            $site = clone(ModelEditSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter($model->tableName));
            $row->addIconSite($site);

            if ($model->isDeleted) {
                $site = clone(ModelUndoDeleteSite::$site);
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new AppParameter());
                $site->addParameter(new ModelParameter($model->tableName));
                $row->addIconSite($site);
            } else {
                $site = clone(ModelDeleteSite::$site);
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new AppParameter());
                $site->addParameter(new ModelParameter($model->tableName));
                $row->addIconSite($site);
            }

            $site = clone(ModelSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter($this->app->appName));
            $site->addParameter(new ModelParameter($model->tableName));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}