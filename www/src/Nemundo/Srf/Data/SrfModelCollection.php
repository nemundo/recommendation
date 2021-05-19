<?php
namespace Nemundo\Srf\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SrfModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Srf\Data\Episode\EpisodeModel());
$this->addModel(new \Nemundo\Srf\Data\MediaType\MediaTypeModel());
$this->addModel(new \Nemundo\Srf\Data\Show\ShowModel());
}
}