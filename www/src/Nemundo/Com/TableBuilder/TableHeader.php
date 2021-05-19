<?php

namespace Nemundo\Com\TableBuilder;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Table\Th;
use Nemundo\Html\Table\Thead;


class TableHeader extends Thead
{

    public function addText($label)
    {
        $th = new Th($this);
        $th->content = $label;
        $th->nowrap = true;
        return $this;
    }


    public function addTextRight($label)
    {
        $th = new Th($this);
        $th->content = $label;
        $th->nowrap = true;
        $th->addCssClass('text-right');
        return $this;
    }


    public function addHyperlink($url, $label = null, $openNewWindow = false)
    {

        if ($label == null) {
            $label = $url;
        }

        $th = new Th($this);

        $hyperlink = new UrlHyperlink($th);
        $hyperlink->content = $label;
        $hyperlink->url = $url;
        $hyperlink->openNewWindow = $openNewWindow;

        return $this;
    }


    public function addEmpty()
    {
        $this->addText('&nbsp;');
        return $this;
    }


    public function addContainer(AbstractContainer $container)
    {

        if ($container->isObjectOfClass(Th::class)) {
            parent::addContainer($container);
        } else {
            $th = new Th();
            $th->addContainer($container);
            parent::addContainer($th);
        }

    }

}
