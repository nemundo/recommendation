<?php

namespace Nemundo\Core\Math\Statistic;

use Nemundo\Core\Base\AbstractBase;


abstract class AbstractNormalizer extends AbstractBase
{

    private $valueList = [];

    /**
     * @var bool
     */
    private $dataLoaded = false;

    public $minValue;

    public $maxValue;

    abstract protected function loadNormalizer();

    protected function addValue($value)
    {

        $this->valueList[] = $value;
        return $this;

    }



    public function normalizeValue($value) {


        if ($this->minValue==null) {
            $valueListTmp = array_diff($this->valueList, [null]);
            $this->minValue = min($valueListTmp);
            $this->maxValue = max($valueListTmp);
        }


        $valueNew = null;

        if ($value !== null) {

            $diff = $this->maxValue - $this->minValue;

            if ($diff !== 0) {
                $valueNew = ($value - $this->minValue) / $diff;
            } else {
                $valueNew = $value - $this->minValue;
            }

        } else {
            $valueNew = null;
        }

        return $valueNew;

    }


    public function getData()
    {
        return $this->valueList;
    }


    public function getNormalizedData()
    {

        if (!$this->dataLoaded) {
            $this->loadNormalizer();
            $this->dataLoaded = true;
        }

        if (sizeof($this->valueList) > 0) {
            $valueListTmp = array_diff($this->valueList, [null]);
            $this->minValue = min($valueListTmp);
            $this->maxValue = max($valueListTmp);
        }

        $valueListNew = [];
        foreach ($this->valueList as $value) {


            $valueListNew[] =$this->normalizeValue($value);


            /*
            if ($value !== null) {

                $diff = $max - $min;

                if ($diff !== 0) {
                    $valueListNew[] = ($value - $min) / $diff;
                } else {
                    $valueListNew[] = $value - $min;
                }

            } else {
                $valueListNew[] = null;
            }*/

        }

        return $valueListNew;

    }

}