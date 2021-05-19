<?php
namespace Nemundo\App\Composer\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Composer\Page\ComposerPage;
class ComposerSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Composer';
$this->url = 'composer';
}
public function loadContent() {
(new ComposerPage())->render();
}
}