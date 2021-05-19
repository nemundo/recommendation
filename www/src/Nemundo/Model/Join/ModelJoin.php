<?php

namespace Nemundo\Model\Join;

use Nemundo\Db\Sql\Join\AbstractSqlJoin;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Reader\AbstractModelDataReader;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\External\ExternalType;

class ModelJoin extends AbstractSqlJoin
{

    /**
     * @var AbstractModelType|ExternalType
     */
    public $type;

    /**
     * @var AbstractModel
     */
    public $externalModel;

    /**
     * @var AbstractModelType
     */
    public $externalType;

    /**
     * @var string
     */
    public $externalAliasTableName;


    public function __construct(AbstractModelDataReader $modelDataReader = null)
    {

        if ($modelDataReader !== null) {
            //$modelDataReader->addJoin($this);
            $modelDataReader->addModelJoin($this);
        }

    }


    public function getSql()
    {

        $this->externalAliasTableName = $this->externalModel->aliasTableName;
        $this->externalTableName = $this->externalModel->tableName;
        $this->fieldName = $this->type->getConditionFieldName();
        $this->externalFieldName = $this->externalType->fieldName;

        $sql = parent::getSql();

        return $sql;

    }

}