<?php
namespace Hackathon\Site;
use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\Web\Site\AbstractSite;
use Hackathon\Page\RssFeedPage;
class RssFeedSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Rss Feed';
$this->url = 'Rss-Feed';
$this->restricted=true;
$this->addRestrictedUsergroup(new AppUsergroup());
}
public function loadContent() {
(new RssFeedPage())->render();
}
}