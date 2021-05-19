<?php

namespace Nemundo\Content\App\WebRadio\Content\WebRadio;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\AudioPlayer;

class WebRadioContentView extends AbstractContentView
{

    /**
     * @var WebRadioContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='46a123a2-058a-42fd-980b-b4015e2de4e4';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $player = new AudioPlayer($this);
        $player->src = $this->contentType->getDataRow()->streamUrl;

        return parent::getContent();

    }
}