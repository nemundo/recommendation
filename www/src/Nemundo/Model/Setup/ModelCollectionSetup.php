<?php

namespace Nemundo\Model\Setup;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Model\Collection\AbstractModelCollection;


class ModelCollectionSetup extends AbstractDbBase
{

    public function addCollection(AbstractModelCollection $collection)
    {

        foreach ($collection->getModelList() as $model) {

            $tableCreator = new ModelSetup();
            $tableCreator->connection = $this->connection;
            $tableCreator->model = $model;
            $tableCreator->createTable();

        }

        return $this;
    }


    public function removeCollection(AbstractModelCollection $collection)
    {

        foreach ($collection->getModelList() as $model) {

            $delete = new ModelSetup();
            $delete->connection = $this->connection;
            $delete->model = $model;
            $delete->dropTable();

        }

        return $this;

    }

}