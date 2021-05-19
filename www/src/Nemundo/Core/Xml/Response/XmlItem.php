<?php

namespace Nemundo\Core\Xml\Response;

use Nemundo\Core\Base;


class XmlItem extends Base\AbstractBaseClass
{

    public $tagName;

    public $value;


    /**
     * @var XmlItem[]
     */
    private $itemList = array();


    /**
     *
     * @var
     */
    private $attributeList = array();


    function __construct($parentElement = null)
    {
        if ($parentElement !== null) {
            $parentElement->addItem($this);
        }
    }


    public function addItem($xmlItem)
    {
        $this->itemList[] = $xmlItem;
    }


    /**
     *
     * @return XmlItem[]
     */
    public function getData()
    {
        $this->checkProperty('tagName');

        return $this->itemList;
    }


    public function addAttribute($name, $value)
    {

        // falls Boolean
        if (is_bool($value)) {
            if ($value) {
                $value = 'true';
            } else {
                $value = 'false';
            }
        }

        $this->attributeList[$name] = $value;

    }


    /**
     *
     *
     */
    public function getAttribute($attributeName)
    {

        $value = '';
        if (isset($this->attributeList[$attributeName])) {
            $value = $this->attributeList[$attributeName];
        }

        if ($value == 'false') $value = false;
        if ($value == 'true') $value = true;

        return $value;
    }


    public function getAttributeList()
    {
        return $this->attributeList;
    }

}
