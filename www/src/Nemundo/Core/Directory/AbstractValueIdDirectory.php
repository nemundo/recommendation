<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractValueIdDirectory extends AbstractBase
{

    /**
     * @var string[]
     */
    public static $valueList = [];


    /**
     * @var bool
     */
    private static $dataLoaded = false;


    abstract protected function getInternalId($value);


    public function __construct()
    {
        if (!AbstractValueIdDirectory::$dataLoaded) {
            $this->loadData();
            AbstractValueIdDirectory::$dataLoaded = true;
        }
    }

    protected function loadData()
    {

    }


    protected function addData($id, $value)
    {

        $valueCrc32 = $this->getCrc32($value);  // crc32($value);
        AbstractValueIdDirectory::$valueList[$valueCrc32] = $id;
        return $this;


    }


    protected function getCrc32($value)
    {

        $crc32 = crc32($value);
        return $crc32;

    }


    public function getId($value)
    {


        $id = null;

        if ($value !== '') {

            $valueCrc32 = $this->getCrc32($value);

            if (isset(AbstractValueIdDirectory::$valueList[$valueCrc32])) {

                $id = AbstractValueIdDirectory::$valueList[$valueCrc32];

            } else {

                $id = $this->getInternalId($value);
                AbstractValueIdDirectory::$valueList[$valueCrc32] = $id;

            }
        }

        return $id;

    }

}