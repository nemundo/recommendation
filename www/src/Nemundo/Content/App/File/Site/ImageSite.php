<?php
namespace Nemundo\Content\App\File\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\File\Page\ImagePage;
class ImageSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Image';
$this->url = 'image';
}
public function loadContent() {
(new ImagePage())->render();
}
}