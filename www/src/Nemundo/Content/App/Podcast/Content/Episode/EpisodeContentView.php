<?php

namespace Nemundo\Content\App\Podcast\Content\Episode;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Player\AudioPlayer;

class EpisodeContentView extends AbstractContentView
{
    /**
     * @var EpisodeContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '2b1b3e7a-bdaf-40aa-96d5-6b1f3e4821cc';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $p=new Paragraph($this);
        $p->content = $this->contentType->getDataRow()->text;

        $small = new Small($this);
        $small->content=$this->contentType->getDataRow()->dateTime->getShortDateTimeLeadingZeroFormat();

        $audio = new AudioPlayer($this);
        $audio->src=$this->contentType->getDataRow()->audioUrl;

        return parent::getContent();

    }
}