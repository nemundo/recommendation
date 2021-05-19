<?php
namespace Nemundo\Srf\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Srf\Page\ShowPage;
class ShowSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Show';
$this->url = 'show';
}
public function loadContent() {
(new ShowPage())->render();
}
}