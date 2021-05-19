<?php
namespace Nemundo\Content\App\Video\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class VideoModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoModel());
$this->addModel(new \Nemundo\Content\App\Video\Data\Vimeo\VimeoModel());
$this->addModel(new \Nemundo\Content\App\Video\Data\YouTube\YouTubeModel());
}
}