<?php

namespace Nemundo\Model\Type\External;

use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Form\Item\External\ExternalModelFormItem;

use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Orm\Model\AbstractOrmModel;


class ExternalType extends AbstractModelType
{

    use TypeListTrait;

    /**
     * @var string
     */
    public $externalModelClassName;

    /**
     * @var string
     */
    public $externalTableName;

    /**
     * @var UniqueIdType
     */
    public $id;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var string
     */
    protected $parentFieldName;


    public function __construct(AbstractModel $model = null, $parentFieldName = null)
    {
        $this->parentFieldName = $parentFieldName;
        parent::__construct($model);

    }


    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->fieldMapping = false;

        $this->filter = new Filter();

        //$this->visible->view = true;

        /*
        $this->formTypeClassName = ExternalModelFormItem::class;
        $this->tableItemClassName = ExternalModelItem::class;
        $this->viewItemClassName = ExternalModelItem::class;*/

    }


    /**
     * @return AbstractOrmModel
     */
    public function getExternalModel()
    {

        /** @var AbstractModel $model */
        $externalModel = new $this->externalModelClassName();

        return $externalModel;

    }


    /*
    public function checkField()
    {

        if (!$this->checkObject('externalModel', $this->externalModel, AbstractModel::class)) {
            return false;
        }

        return parent::checkField();

    }*/

}