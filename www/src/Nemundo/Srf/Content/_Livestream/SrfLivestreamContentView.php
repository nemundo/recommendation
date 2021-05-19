<?php


namespace Nemundo\Srf\Content\Livestream;


use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Player\SrfPlayer;

class SrfLivestreamContentView extends AbstractContentView
{

    /**
     * @var SrfLivestreamContentType
     */
    public $contentType;

    public function getContent()
    {

        $row = $this->contentType->getDataRow();

        $player = new SrfPlayer($this);
        $player->urn = $row->urn;

        /*
        $p = new Paragraph($this);
        $p->content = $row->livestream;*/

        return parent::getContent();

    }

}