<?php
namespace Nemundo\Content\Index\Log\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\Index\Log\Page\LogPage;
class LogSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Log';
$this->url = 'log';
}
public function loadContent() {
(new LogPage())->render();
}
}