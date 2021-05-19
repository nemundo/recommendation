<?php
namespace Hackathon\Site;
use Nemundo\Web\Site\AbstractSite;
use Hackathon\Page\SourcePage;
class SourceSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Source';
$this->url = 'source';
}
public function loadContent() {
(new SourcePage())->render();
}
}