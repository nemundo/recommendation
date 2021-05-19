<?php
namespace Nemundo\Content\App\Translation\Content\TranslationLargeText;

use Nemundo\Content\Type\AbstractContentType;

class TranslationLargeTextContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'TranslationLargeText';
$this->typeId = '77e6d129-8b48-40de-ad9f-c759f7b2382e';
$this->formClassList[] = TranslationLargeTextContentForm::class;
$this->viewClassList[] = TranslationLargeTextContentView::class;
}
protected function onCreate() {
}
protected function onUpdate() {
}
protected function onIndex() {
}
protected function onDataRow() {
}
/**
* @return \Nemundo\Model\Row\AbstractModelDataRow
*/
public function getDataRow() {
return parent::getDataRow(); 
}
}