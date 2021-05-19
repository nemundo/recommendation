<?php
namespace Nemundo\Content\App\Podcast\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\Podcast\Page\PodcastPage;
class PodcastSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Podcast';
$this->url = 'podcast';
}
public function loadContent() {
(new PodcastPage())->render();
}
}