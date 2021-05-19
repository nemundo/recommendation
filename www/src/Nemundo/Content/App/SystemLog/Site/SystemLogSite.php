<?php
namespace Nemundo\Content\App\SystemLog\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\SystemLog\Page\SystemLogPage;
class SystemLogSite extends AbstractSite {
protected function loadSite() {
$this->title = 'SystemLog';
$this->url = 'SystemLog';
}
public function loadContent() {
(new SystemLogPage())->render();
}
}