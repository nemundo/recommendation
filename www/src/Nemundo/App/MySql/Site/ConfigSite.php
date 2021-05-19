<?php
namespace Nemundo\App\MySql\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\MySql\Page\ConfigPage;
class ConfigSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Config';
$this->url = 'config';
}
public function loadContent() {
(new ConfigPage())->render();
}
}