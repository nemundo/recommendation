<?php

namespace Nemundo\Orm\Setup;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Collection\AbstractModelCollection;
use Nemundo\Model\Database\AbstractDatabase;
use Nemundo\Project\AbstractProject;


class OrmCollectionSetup extends AbstractBaseClass
{

    /**
     * @var AbstractProject
     */
    public $project;


    public function addDatabase(AbstractDatabase $database)
    {


        $this->project = $database->project;

        foreach ($database->getCollectionList() as $collection) {
            $this->addCollection($collection);
        }

    }


    public function addCollection(AbstractModelCollection $collection)
    {

        if (!$this->checkObject('project', $this->project, AbstractProject::class)) {
            return;
        }

        foreach ($collection->getModelList() as $model) {
            $setup = new OrmModelSetup();
            $setup->project = $this->project;
            $setup->model = $model;
            $setup->createOrm();
        }

    }

}