<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Video\YouTube\YouTubePlayer;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;


class YouTubeTitleDescriptionContentView extends AbstractContentView
{

    /**
     * @var YouTubeContentType
     */
    public $contentType;

    public $viewName='Video, Title & Description';

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='e9992649-041f-47d2-97f6-43bd8fcfd514';
        $this->defaultView=false;

    }

    public function getContent()
    {

        $youtubeRow = $this->contentType->getDataRow();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $youtubeRow->title;

        $player = new YouTubePlayer($this);
        $player->videoId = $youtubeRow->youtubeId;
        $player->autoPlay = true;

        $p = new Paragraph($this);
        $p->content = $youtubeRow->description;

        return parent::getContent();

    }

}