<?php

namespace Nemundo\Core\Base;



// AbstractComplexBase
// AbstractBaseExtended
abstract class AbstractBaseClass extends AbstractBase
{

    public function getClassName()
    {
        $className = get_class($this);
        return $className;
    }


    public function getClassNameWithoutNamespace()
    {
        $className = (new \ReflectionClass($this))->getShortName();
        return $className;
    }


    public function isObjectOfClass($className)
    {
        $returnValue = is_a($this, $className);
        return $returnValue;
    }


    public function getTraitList()
    {

        $className = get_class($this);
        $traitList = [];
        do {
            $traitList = array_merge(class_uses($className), $traitList);
        } while ($className = get_parent_class($className));

        return $traitList;
    }


    public function isObjectOfTrait($traitName)
    {

        $returnValue = array_key_exists($traitName, $this->getTraitList());
        return $returnValue;

    }

}
