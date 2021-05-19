<?php

namespace Nemundo\Html\Container;


use Nemundo\Core\Language\Translation;


abstract class AbstractHtmlContainer extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string|string[]
     */
    public $title;

    /**
     * @var bool
     */
    public $visible = true;

    /**
     * @var string[]
     */
    protected $cssClassList = [];

    /**
     * @var AbstractHtmlContainer[]
     */
    protected $containerList = [];


    public function addCssClass($cssClass)
    {

        $this->cssClassList[] = $cssClass;
        return $this;

    }


    /**
     * @return HtmlContainerItem
     */
    public function getContent()
    {

        $item = null;

        if ($this->visible) {

            $this->addAttribute('id', $this->id);

            if ($this->title !== null) {
                $this->addAttribute('title', (new Translation())->getText($this->title));
            }

            $this->cssClassList = array_unique($this->cssClassList);
            if (sizeof($this->cssClassList) > 0) {
                $this->addAttribute('class', join(' ', $this->cssClassList));
            }

            $item = parent::getContent();

        } else {
            $item = new HtmlContainerItem();
        }

        return $item;

    }


    protected function addContent($content)
    {

        $text = $content;
        if (is_array($content)) {
            $text = (new Translation())->getText($content);
        }

        parent::addContent($text);

        return $this;

    }

}