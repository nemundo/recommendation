<?php

namespace Nemundo\Html\Container;

use Nemundo\Core\Base\AbstractBaseClass;


abstract class AbstractContainer extends AbstractBaseClass
{

    /**
     * @var AbstractContainer[]
     */
    protected $containerList = [];

    /**
     * @var string
     */
    private $content = '';


    public function __construct(AbstractContainer $parentContainer = null)
    {

        if ($parentContainer !== null) {
            $parentContainer->addContainer($this);
        }

        $this->loadContainer();

    }


    protected function loadContainer()
    {

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->containerList[] = $container;
        return $this;

    }


    public function addContainerAtFirst(AbstractContainer $container)
    {

        array_unshift($this->containerList, $container);
        return $this;

    }


    public function getContainerList($recursive = false)
    {

        /** @var AbstractContainer[] $containerList */
        $containerList = [];

        foreach ($this->containerList as $container) {

            $containerList[] = $container;

            if ($recursive) {
                $containerList = array_merge($containerList, $container->getContainerList(true));
            }

        }

        return $containerList;

    }


    public function hasChild()
    {

        $value = false;
        if (sizeof($this->containerList) > 0) {
            $value = true;
        }

        return $value;

    }


    public function getContent()
    {

        $item = new HtmlContainerItem();
        $item->bodyContent .= $this->content;

        foreach ($this->getContainerList() as $com) {
            $childItem = $com->getContent();
            $item->headerContent .= $childItem->headerContent;
            $item->bodyContent .= $childItem->bodyContent;
        }

        return $item;

    }


    protected function addContent($content)
    {

        $this->content .= $content;
        return $this;

    }

}