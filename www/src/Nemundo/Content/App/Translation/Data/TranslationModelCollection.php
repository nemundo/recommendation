<?php
namespace Nemundo\Content\App\Translation\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TranslationModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Translation\Data\Language\LanguageModel());
$this->addModel(new \Nemundo\Content\App\Translation\Data\LargeTextTranslation\LargeTextTranslationModel());
$this->addModel(new \Nemundo\Content\App\Translation\Data\TextTranslation\TextTranslationModel());
$this->addModel(new \Nemundo\Content\App\Translation\Data\Translation\TranslationModel());
}
}