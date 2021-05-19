<?php
namespace Nemundo\Srf\App\Livestream\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class LivestreamModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Srf\App\Livestream\Data\RadioLivestream\RadioLivestreamModel());
$this->addModel(new \Nemundo\Srf\App\Livestream\Data\TvLivestream\TvLivestreamModel());
}
}