<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapHyperlinkCard extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    public $url;

    public function getContent()
    {

        $this->addContent('
 <a href="' . $this->url . '">
<div class="card">
  <div class="card-block">
    <h4 class="card-title">' . $this->title . '</h4>
    <p class="card-text">' . $this->text . '</p>
  </div>
</div>
</a>');

        // <a href="#" class="btn btn-primary">Go somewhere</a>

        return parent::getContent();
    }


}