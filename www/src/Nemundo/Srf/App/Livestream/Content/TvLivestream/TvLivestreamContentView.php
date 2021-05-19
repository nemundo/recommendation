<?php
namespace Nemundo\Srf\App\Livestream\Content\TvLivestream;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Player\SrfPlayer;

class TvLivestreamContentView extends AbstractContentView {
/**
* @var TvLivestreamContentType
*/
public $contentType;

public function getContent() {

    $row = $this->contentType->getDataRow();

    $player = new SrfPlayer($this);
    $player->urn = $row->urn;

return parent::getContent();
}
}