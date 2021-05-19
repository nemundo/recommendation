<?php

namespace Nemundo\Package\Bootstrap\Box;


use Nemundo\Html\Block\ContentDiv;

abstract class AbstractBox extends ContentDiv
{

    /**
     * @var bool
     */
    public $closingButton = false;


    public function getContent()
    {

        $this->addCssClass('alert');

        // Closing Button
        if ($this->closingButton) {
            //$this->addJsLibrary('https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');
            //$this->addJsLibrary('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');

            $this->content = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->content;
            $this->addCssClass('close');
        }

        return parent::getContent();
    }

}