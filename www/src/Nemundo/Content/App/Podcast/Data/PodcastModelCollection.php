<?php
namespace Nemundo\Content\App\Podcast\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PodcastModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Podcast\Data\Episode\EpisodeModel());
$this->addModel(new \Nemundo\Content\App\Podcast\Data\Podcast\PodcastModel());
}
}