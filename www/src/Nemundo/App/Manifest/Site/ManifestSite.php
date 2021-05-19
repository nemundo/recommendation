<?php
namespace Nemundo\App\Manifest\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Manifest\Page\ManifestPage;
class ManifestSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Manifest';
$this->url = 'manifest';
}
public function loadContent() {
(new ManifestPage())->render();
}
}