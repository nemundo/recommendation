<?php

namespace Nemundo\Core\Sorting;


use Nemundo\Core\Base\AbstractBase;

// ObjectSorting
class SortingListOfObject extends AbstractBase
{

    /**
     * @var array
     */
    public $objectList;

    /**
     * @var string
     */
    public $sortingProperty;


    // http://www.frandieguez.com/blog/2011/02/sort-an-array-of-objects-by-one-of-the-object-property-with-php/


    public function getSortedListOfObject()
    {

        $this->checkProperty('objectList');
        $this->checkProperty('sortingProperty');

        if (sizeof($this->objectList) > 0) {

            $cur = 1;
            $stack[1]['l'] = 0;
            $stack[1]['r'] = count($this->objectList) - 1;


            do {
                $l = $stack[$cur]['l'];
                $r = $stack[$cur]['r'];
                $cur--;

                do {
                    $i = $l;
                    $j = $r;
                    $tmp = $this->objectList[(int)(($l + $r) / 2)];

                    // split the array in to parts
                    // first: objects with "smaller" property $property
                    // second: objects with "bigger" property $property
                    do {
                        while ($this->objectList[$i]->{$this->sortingProperty} < $tmp->{$this->sortingProperty}) $i++;
                        while ($tmp->{$this->sortingProperty} < $this->objectList[$j]->{$this->sortingProperty}) $j--;

                        // Swap elements of two parts if necesary
                        if ($i <= $j) {
                            $w = $this->objectList[$i];
                            $this->objectList[$i] = $this->objectList[$j];
                            $this->objectList[$j] = $w;

                            $i++;
                            $j--;
                        }

                    } while ($i <= $j);

                    if ($i < $r) {
                        $cur++;
                        $stack[$cur]['l'] = $i;
                        $stack[$cur]['r'] = $r;
                    }
                    $r = $j;

                } while ($l < $r);

            } while ($cur != 0);

        }

        return $this->objectList;

    }


}