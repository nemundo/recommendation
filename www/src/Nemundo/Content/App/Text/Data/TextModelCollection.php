<?php
namespace Nemundo\Content\App\Text\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TextModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Text\Data\LargeText\LargeTextModel());
$this->addModel(new \Nemundo\Content\App\Text\Data\Text\TextModel());
$this->addModel(new \Nemundo\Content\App\Text\Data\TextIndex\TextIndexModel());
$this->addModel(new \Nemundo\Content\App\Text\Data\VersionLargeText\VersionLargeTextModel());
$this->addModel(new \Nemundo\Content\App\Text\Data\VersionText\VersionTextModel());
}
}