<?php
namespace Nemundo\Srf\Cms\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CmsModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Srf\Cms\Data\LivestreamCms\LivestreamCmsModel());
}
}