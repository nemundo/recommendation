<?php

namespace Nemundo\Content\App\File\Content\Audio;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\AudioPlayer;

class AudioContentView extends AbstractContentView
{
    /**
     * @var AudioContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='bc5aee7f-04e8-4a91-8bc3-167436ea5309';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $audio = new AudioPlayer($this);
        $audio->src = $fileRow->audio->getUrl();

        return parent::getContent();

    }
}