<?php

namespace Nemundo\Srf\App\Livestream\Content\RadioLivestream;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Com\Player\SrfPlayer;

class RadioLivestreamContentView extends AbstractContentView
{
    /**
     * @var RadioLivestreamContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='dfb260ac-91f6-4481-9acf-439f55d4208f';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $row = $this->contentType->getDataRow();

        $player = new SrfPlayer($this);
        $player->urn = $row->urn;


        return parent::getContent();
    }
}