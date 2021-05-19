<?php

namespace Nemundo\Core\Math\Statistic;

use Nemundo\Core\Base\AbstractBase;

// Label
abstract class AbstractMultiNormalizer extends AbstractBase
{

    private $valueList = [];

    /**
     * @var bool
     */
    private $dataLoaded = false;

    abstract protected function loadNormalizer();


    protected function addValue($label, $xValue, $yValue)
    {

        $this->valueList[$label][$xValue] = $yValue;
        return $this;

    }


    public function getNormalizedData($label)
    {

        if (!$this->dataLoaded) {
            $this->loadNormalizer();
            $this->dataLoaded = true;
        }

        if (sizeof($this->valueList[$label]) > 0) {
            $min = min($this->valueList);
            $max = max($this->valueList);
        }

        $valueListNew = [];
        foreach ($this->valueList as $value) {

            $diff = $max - $min;

            if ($diff !== 0) {
                $valueListNew[] = ($value - $min) / $diff;
            } else {
                $valueListNew[] = $value - $min;
            }

        }

        return $valueListNew;

    }

}