<?php

namespace Nemundo\Model\Reader;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Reader\AbstractDataReader;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Model\Join\ModelJoinListTrait;
use Nemundo\Model\Row\ModelDataRow;

abstract class AbstractModelDataReader extends AbstractDataReader
{

    use FieldAddTrait;
    use ModelJoinListTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var bool
     */
    protected $defaultOrderBy = true;


    public function addOrder(AbstractField $field, $sortOrder = SortOrder::ASCENDING)
    {
        $this->defaultOrderBy = false;
        return parent::addOrder($field, $sortOrder);
    }


    /**
     * @return ModelDataRow[]
     */
    public function getData()
    {

        $this->prepareData();

        $list = [];
        foreach (parent::getData() as $row) {
            $dataRow = new ModelDataRow($row->getData());
            $dataRow->model = $this->model;
            $list[] = $dataRow;
        }

        return $list;

    }


    /**
     * @return ModelDataRow
     */
    public function getRow()
    {

        $this->prepareData();

        $data = parent::getRow();

        $modelRow = new ModelDataRow($data->getData());
        $modelRow->model = $this->model;

        return $modelRow;

    }


    public function getRowById($id)
    {

        if ($id == null) {
            (new LogMessage())->writeError('No Return Value for GetRowById. Table Name: ' . $this->model->tableName . ' Id: ' . $id);
        }

        $this->filter->andEqual($this->model->id, $id);
        $row = $this->getRow();

        return $row;

    }


    private function prepareData()
    {

        /*if (!$this->checkProperty('model')) {
            exit;
        }*/

        $this->tableName = $this->model->tableName;
        $this->aliasTableName = $this->model->aliasTableName;

        if ($this->defaultOrderBy) {
            foreach ($this->model->getDefaultOrderList() as $type) {
                $this->addOrder($type->type);
            }
        }

        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);

        foreach ($this->modelJoinList as $modelJoin) {

            $this->addJoin($modelJoin);

            $this->addFieldByModel($modelJoin->externalModel);
            $this->checkExternal($modelJoin->externalModel);

        }

    }

}
