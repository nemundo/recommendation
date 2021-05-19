<?php


namespace Nemundo\Content\Type;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Row\AbstractModelDataRow;


// AbstractDataType
// AbstractContentBaseType
// AbstractType
abstract class AbstractBaseType extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $dataId;
    // --> private???

    /**
     * @var bool
     */
    private $createMode = true;

    /**
     * @var string
     */
    protected $formClass;

    /**
     * @var string
     */
    //protected $searchFormClass;

    /**
     * @var string
     */
    protected $viewClass;

    protected $viewClassList = [];

    protected $formClassList = [];

    /**
     * @var AbstractModelDataRow
     */
    protected $dataRow;

    /**
     * @var bool
     */
    //protected $restrictedGroup = false;


    /**
     * @var bool
     */
    protected $deletable = true;


    public function __construct($dataId = null)
    {

        $this->fromDataId($dataId);

    }


    public function fromDataId($dataId = null)
    {

        if ($dataId !== null) {
            $this->dataId = $dataId;
            $this->createMode = false;
        }

        return $this;

    }


    public function getDataId()
    {

        return $this->dataId;

    }


    protected function onCreate()
    {

    }


    protected function onUpdate()
    {

        $this->onCreate();

    }


    public function saveType()
    {

        if (!$this->existItem()) {
            $this->onCreate();
        } else {
            $this->onUpdate();
        }

    }


    protected function onDelete()
    {

    }


    public function deleteType()
    {

        $this->onDelete();

    }


    // existsItem
    public function existItem()
    {

        return !$this->createMode;

    }

}