<?php

namespace Nemundo\Admin\Com\Title;


use Nemundo\Html\Container\AbstractContentContainer;

class AdminSubtitle extends AbstractContentContainer
{

    use AdminSubtitleTrait;

    public function getContent()
    {

        $this->loadTitle();

        //$this->tagName = 'h5';

        //$this->addCss(new BootstrapItalic());

        return parent::getContent();
    }

}