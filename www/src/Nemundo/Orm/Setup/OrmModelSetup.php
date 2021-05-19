<?php

namespace Nemundo\Orm\Setup;


use Nemundo\Core\Base\AbstractBase;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Dev\Code\PhpNamespace;
use Nemundo\Orm\Code\AdminOrmCode;
use Nemundo\Orm\Code\AdminSiteOrmCode;
use Nemundo\Orm\Code\DataBulkOrmCode;
use Nemundo\Orm\Code\DataCountOrmCode;
use Nemundo\Orm\Code\DataDeleteOrmCode;
use Nemundo\Orm\Code\DataIdValueOrmCode;
use Nemundo\Orm\Code\DataOrmCode;
use Nemundo\Orm\Code\DataPaginationReaderOrmCode;
use Nemundo\Orm\Code\DataReaderOrmCode;
use Nemundo\Orm\Code\DataRowOrmCode;
use Nemundo\Orm\Code\DataUpdateOrmCode;
use Nemundo\Orm\Code\DataValueOrmValue;
use Nemundo\Orm\Code\ExternalTypeOrmCode;
use Nemundo\Orm\Code\FormOrmCode;
use Nemundo\Orm\Code\FormUpdateOrmCode;
use Nemundo\Orm\Code\ListBoxOrmCode;
use Nemundo\Orm\Code\ModelOrmCode;
use Nemundo\Orm\Code\OrmCodeView;
use Nemundo\Orm\Code\PaginationTableOrmCode;
use Nemundo\Orm\Code\RedirectOrmCode;
use Nemundo\Orm\Code\TableOrmCode;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Path\ProjectPath;


class OrmModelSetup extends AbstractBase
{

    /**
     * @var AbstractOrmModel
     */
    public $model;

    /**
     * @var AbstractProject
     */
    public $project;


    public function createExternal()
    {
        $orm = new ExternalTypeOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

    }


    public function createModel()
    {

        $orm = new ModelOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

    }


    public function createOrm()
    {

        if ($this->model->namespace == null) {
            (new LogMessage())->writeError('Namespace not defined. ' . $this->model->getClassName());
            return;
        }

        if ($this->model->className == null) {
            (new LogMessage())->writeError('Class Name not defined');
            return;
        }

        if (!$this->checkObject('project', $this->project, AbstractProject::class)) {
            return;
        }

        $orm = new ModelOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataBulkOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new ExternalTypeOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataUpdateOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataRowOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataReaderOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataPaginationReaderOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataValueOrmValue();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataIdValueOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataCountOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new DataDeleteOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        $orm = new RedirectOrmCode();
        $orm->project = $this->project;
        $orm->model = $this->model;
        $orm->createClass();

        if ($this->model->createAdminOrm) {

            $orm = new FormOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new FormUpdateOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new TableOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new PaginationTableOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new AdminOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new AdminSiteOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

            $orm = new OrmCodeView();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();

        }

        if ($this->model->createListBoxOrm) {
            $orm = new ListBoxOrmCode();
            $orm->project = $this->project;
            $orm->model = $this->model;
            $orm->createClass();
        }

    }


    public function deleteOrm()
    {

        $namespace = new PhpNamespace();
        $namespace->namespace = $this->model->namespace;
        $namespace->prefixNamespace = $this->project->namespace;

        (new Path())
            ->addPath($this->project->path)
            ->addPath($namespace->getPath())
            ->deleteDirectory();

    }

}