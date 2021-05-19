<?php

namespace Nemundo\Html\Player;


use Nemundo\Html\Container\AbstractHtmlContainer;


// Audio
class AudioPlayer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;

    public function getContent()
    {

        $this->tagName = 'audio';

        $this->addAttributeWithoutValue('controls');

        $source = new Source($this);
        $source->src = $this->src;
        $source->type = 'audio/mpeg';

        $this->addContent('Your browser does not support the audio element.');

        return parent::getContent();

    }

}