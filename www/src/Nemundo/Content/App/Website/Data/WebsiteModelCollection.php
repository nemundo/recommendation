<?php
namespace Nemundo\Content\App\Website\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebsiteModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Website\Data\Webpage\WebpageModel());
$this->addModel(new \Nemundo\Content\App\Website\Data\Website\WebsiteModel());
}
}