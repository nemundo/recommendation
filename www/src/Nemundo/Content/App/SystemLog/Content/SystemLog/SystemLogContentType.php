<?php
namespace Nemundo\Content\App\SystemLog\Content\SystemLog;
use Nemundo\Content\Type\AbstractContentType;
class SystemLogContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'SystemLog';
$this->typeId = '1c0a7710-b8f1-4ef5-956a-57cc4adb2982';
$this->formClassList[] = SystemLogContentForm::class;
$this->viewClassList[] = SystemLogContentView::class;
}
protected function onCreate() {
}
protected function onUpdate() {
}
protected function onDelete() {
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