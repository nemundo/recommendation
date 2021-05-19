<?php


namespace Nemundo\Content\App\Video\Content\Vimeo;


use Nemundo\Com\Video\Vimeo\VimeoPlayer;
use Nemundo\Content\View\AbstractContentView;

class VimeoContentView extends AbstractContentView
{

    /**
     * @var VimeoContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='69f1e3c6-a0dc-45b3-b944-1cd863aa582d';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $player = new VimeoPlayer($this);
        $player->videoId = $this->contentType->getDataRow()->vimeoId;
        return parent::getContent();

    }

}