<?php


namespace Nemundo\Content\Form;


class ContentForm extends AbstractContentForm
{

    /*
    public function getContent()
    {

        $this->submitButton->label = $this->contentType->typeLabel;
        return parent::getContent();

    }*/


    protected function onSubmit()
    {

        $this->contentType->saveType();

    }

}