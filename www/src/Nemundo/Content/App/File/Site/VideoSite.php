<?php
namespace Nemundo\Content\App\File\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\File\Page\VideoPage;
class VideoSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Video';
$this->url = 'video';
}
public function loadContent() {
(new VideoPage())->render();
}
}