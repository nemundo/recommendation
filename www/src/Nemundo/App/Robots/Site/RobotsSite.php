<?php
namespace Nemundo\App\Robots\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Robots\Page\RobotsPage;
class RobotsSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Robots';
$this->url = 'robots';
}
public function loadContent() {
(new RobotsPage())->render();
}
}