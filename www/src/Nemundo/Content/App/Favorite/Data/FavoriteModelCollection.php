<?php
namespace Nemundo\Content\App\Favorite\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FavoriteModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Favorite\Data\Favorite\FavoriteModel());
}
}