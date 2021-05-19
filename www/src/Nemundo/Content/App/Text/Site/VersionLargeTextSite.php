<?php
namespace Nemundo\Content\App\Text\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\Text\Page\VersionLargeTextPage;
class VersionLargeTextSite extends AbstractSite {
protected function loadSite() {
$this->title = 'VersionLargeText';
$this->url = 'VersionLargeText';
}
public function loadContent() {
(new VersionLargeTextPage())->render();
}
}