<?php
namespace Nemundo\Content\App\Widget\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\Widget\Page\WidgetPage;
class WidgetSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Widget';
$this->url = 'widget';
}
public function loadContent() {
(new WidgetPage())->render();
}
}