<?php

namespace Nemundo\Orm\Model;

use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\File\ImageOrmType;
use Nemundo\Orm\Type\Id\IdOrmType;
use Nemundo\Orm\Type\Id\UniqueIdOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

abstract class AbstractOrmModel extends AbstractModel
{

    /**
     * @var string
     */
    public $modelId;

    /**
     * @var string
     */
    public $templateLabel;

    /**
     * @var string
     */
    public $templateId;

    /**
     * @var string
     */
    public $templateName;

    /**
     * @var string
     */
    public $templateExtendsClass = AbstractModel::class;

    /**
     * @var string
     */
    public $className;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var bool
     */
    public $createDataOrm = true;

    /**
     * @var bool
     */
    public $createAdminOrm = false;

    /**
     * @var bool
     */
    public $createListBoxOrm = false;

    /**
     * @var string
     */
    public $rowClassName;

    /**
     * @var UniqueIdOrmType
     */
    public $id;

    /**
     * @var bool
     */
    public $isDeleted = false;

    public function __construct()
    {

        $this->id = new IdOrmType($this);
        $this->id->fieldName = 'id';
        $this->id->variableName = 'id';

        parent::__construct();

    }


    public function getModel()
    {

        $className = '\\' . $this->namespace . '\\' . $this->className . 'Model';

        /** @var AbstractOrmModel $model */
        $model = new $className();
        return $model;

    }


    /**
     * @param bool $recursiv
     * @return AbstractModelType[]|TextOrmType[]|ExternalOrmType[]|ImageOrmType[]
     */
    public function getTypeList($recursiv = false, $disableDelete = true)
    {

        /** @var TextOrmType[] $list */
        $list = parent::getTypeList($recursiv);

        if ($disableDelete) {

            $listTmp = $list;
            $list = [];

            foreach ($listTmp as $type) {
                if (!$type->isDeleted) {
                    $list[] = $type;
                }
            }

        }

        return $list;

    }

}