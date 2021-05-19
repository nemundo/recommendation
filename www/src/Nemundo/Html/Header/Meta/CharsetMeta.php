<?php


namespace Nemundo\Html\Header\Meta;


class CharsetMeta extends AbstractMeta
{

    public $charset = 'UTF-8';

    public function getContent()
    {

        $this->addAttribute('charset', $this->charset);
        return parent::getContent();

    }

}