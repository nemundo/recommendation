<?php
namespace Nemundo\Content\App\Notification\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\Notification\Page\ConfigPage;
class ConfigSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Config';
$this->url = 'config';
}
public function loadContent() {
(new ConfigPage())->render();
}
}