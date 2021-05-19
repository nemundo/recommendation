<?php
namespace Nemundo\Content\App\Bookmark\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class BookmarkModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkModel());
}
}