<?php

namespace Nemundo\Html\Container;


use Nemundo\Html\Header\AbstractHeaderHtmlContainer;

abstract class AbstractTagContainer extends AbstractContainer
{

    /**
     * @var string
     */
    protected $tagName;

    /**
     * @var bool
     */
    protected $renderClosingTag = true;

    /**
     * @var bool
     */
    protected $returnOneLine = false;

    private $attributeList = [];

    private $attributeWithoutValue = [];

    /**
     * @var AbstractTagContainer[]
     */
    protected $containerList = [];

    /**
     * @var string
     */
    private $content = '';

    public function addDataAttribute($attribute, $value)
    {

        $this->attributeList['data-' . $attribute] = $value;

    }


    protected function addAttribute($attribute, $value)
    {

        if ($value !== null) {
            $this->attributeList[$attribute] = $value;
        }

    }

    protected function addAttributeWithoutValue($attribute)
    {

        $this->attributeWithoutValue[] = $attribute;

    }


    protected function getAttribute()
    {

        $attribute = '';

        foreach ($this->attributeList as $key => $value) {
            $attribute = $attribute . ' ' . $key . '="' . $value . '"';
        }

        foreach ($this->attributeWithoutValue as $value) {
            $attribute = $attribute . ' ' . $value;
        }

        return $attribute;
    }


    protected function getOpeningTag()
    {

        $closing = '>';
        if (!$this->renderClosingTag) {
            $closing = ' />';
        }

        $html = '<' . $this->tagName . $this->getAttribute() . $closing;

        if (!$this->returnOneLine) {
        $html .= PHP_EOL;
        }

        return $html;

    }


    protected function getClosingTag()
    {

        $html = '</' . $this->tagName . '>';  // . PHP_EOL;

        if (!$this->returnOneLine) {
            $html .= PHP_EOL;
        }

        return $html;

    }


    public function getContent()
    {

        $html = '';

        if ($this->tagName !== null) {
            $html = $this->getOpeningTag();
        }

        $parentItem = parent::getContent();

        $html .= $this->content;
        $html .= $parentItem->bodyContent;

        if ($this->tagName !== null) {
            if ($this->renderClosingTag) {
                $html .= $this->getClosingTag();
            }
        }

        /*if ($this->returnOneLine) {
            $html = str_replace(PHP_EOL, '', $html);
        }*/

        //$html .= PHP_EOL;
        if (!$this->returnOneLine) {
            $html .= PHP_EOL;
        }


        $item = new HtmlContainerItem();

        if ($this->isObjectOfClass(AbstractHeaderHtmlContainer::class)) {
            $item->headerContent = $parentItem->headerContent . $html;
        } else {
            $item->bodyContent = $html;
            $item->headerContent = $parentItem->headerContent;
        }

        return $item;

    }


    public function getBodyContent()
    {
        return $this->getContent()->bodyContent;
    }


    public function getHeaderContent()
    {
        return $this->getContent()->headerContent;
    }

}