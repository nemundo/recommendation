<?php

namespace Nemundo\Core\Math\Statistic;

use Nemundo\Core\Base\AbstractBase;


abstract class AbstractLabelValueNormalizer extends AbstractBase
{

    private $valueList = [];

    /**
     * @var bool
     */
    private $dataLoaded = false;

    abstract protected function loadNormalizer();

    protected function addValue($label, $value)
    {

        $this->valueList[$label] = $value;
        return $this;

    }


    public function getNormalizedData()
    {

        if (!$this->dataLoaded) {
            $this->loadNormalizer();
            $this->dataLoaded = true;
        }

        if (sizeof($this->valueList) > 0) {
            $min = min($this->valueList);
            $max = max($this->valueList);
        }


        /** @var LabelValue[] $valueListNew */
        $valueListNew = [];

        foreach ($this->valueList as $key => $value) {

            $diff = $max - $min;

            $valueNew = null;

            if ($diff !== 0) {
                $valueNew = ($value - $min) / $diff;
            } else {
                $valueNew = $value - $min;
            }

            $labelValue = new LabelValue();
            $labelValue->label = $key;
            $labelValue->value = $valueNew;
            $valueListNew[] = $labelValue;

        }

        return $valueListNew;

    }

}