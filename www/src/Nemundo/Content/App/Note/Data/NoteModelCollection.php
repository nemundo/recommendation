<?php
namespace Nemundo\Content\App\Note\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class NoteModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Note\Data\Note\NoteModel());
}
}