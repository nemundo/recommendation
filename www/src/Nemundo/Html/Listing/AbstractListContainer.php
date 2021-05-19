<?php

namespace Nemundo\Html\Listing;


use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractListContainer extends AbstractHtmlContainer
{

    /**
     * @var Li[]
     */
    public function addContainer(AbstractContainer $container = null)
    {

        if ($container->isObjectOfClass(Li::class)) {
            parent::addContainer($container);
        } else {
            $li = new Li();
            $li->addContainer($container);
            parent::addContainer($li);
        }

    }


    // protected
    public function addText($text)
    {

        $li = new Li($this);
        $li->content = $text;

        return $this;

    }


}
