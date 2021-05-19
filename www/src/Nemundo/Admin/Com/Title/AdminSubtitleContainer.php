<?php

namespace Nemundo\Admin\Com\Title;


use Nemundo\Html\Container\AbstractHtmlContainer;

class AdminSubtitleContainer extends AbstractHtmlContainer
{

    use AdminSubtitleTrait;

    public function getContent()
    {
        $this->loadTitle();
        return parent::getContent();
    }

}