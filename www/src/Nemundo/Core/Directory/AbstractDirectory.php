<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractDirectory extends AbstractBaseClass
{

    /**
     * @var bool
     */
    public $sorted = false;

    /**
     * @var int[]
     */
    protected $list = [];


    public function __construct($value = null)
    {
        if ($value !== null) {
            $this->addValue($value);
        }
    }


    public function addValue($value)
    {

        if (is_array($value)) {
            $this->list = array_merge($this->list, $value);
        } else {
            $this->list[] = $value;
        }


        return $this;

    }


    public function addList(AbstractDirectory $textList)
    {
        $this->list = array_merge($this->list, $textList->getData());
        return $this;
    }


    public function getData()
    {
        if ($this->sorted) {
            $this->sort();
        }

        return $this->list;
    }

    public function sort()
    {
        sort($this->list);
        return $this;
    }

    public function removeDuplicateItem()
    {
        $this->list = array_unique($this->list);
        $this->list = array_values($this->list);
        return $this;
    }

    public function removeEmptyItem()
    {
        $list = array();
        foreach ($this->list as $value) {

        }

    }


    public function getText()
    {
        $seperator = PHP_EOL;
        $text = join($seperator, $this->list);
        return $text;
    }


    public function getTextWithSeperator($seperator = ', ')
    {
        $text = join($seperator, $this->list);
        return $text;
    }


    public function getCount()
    {

        $count = sizeof($this->list);
        return $count;

    }


    public function isEmpty()
    {

        $value = false;
        if ($this->getCount() == 0) {
            $value = true;
        }

        return $value;

    }


    public function getStatisticList()
    {

        $statisticList = array_count_values($this->list);

        $min = min(array_keys($statisticList));
        $max = max(array_keys($statisticList));

        for ($n = $min; $n <= $max; $n++) {
            if (!isset($statisticList[$n])) {
                $statisticList[$n] = 0;
            }
        }

        ksort($statisticList);

        return $statisticList;

    }


    public function getCountTerm2($term)
    {
        $count = 0;
        $countList = array_count_values($this->list);
        if (isset($countList[$term])) {
            $count = $countList[$term];
        }

        //http://php.net/manual/de/function.array-count-values.php

        return $count;
    }


}