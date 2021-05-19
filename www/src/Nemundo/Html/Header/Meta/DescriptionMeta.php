<?php


namespace Nemundo\Html\Header\Meta;


class DescriptionMeta extends AbstractMeta
{

    public $description;

    public function getContent()
    {

        $this->name = 'description';
        $this->content = $this->description;

        return parent::getContent();

    }

}