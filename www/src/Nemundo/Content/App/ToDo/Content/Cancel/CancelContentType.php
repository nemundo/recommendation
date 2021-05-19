<?php
namespace Nemundo\Content\App\ToDo\Content\Cancel;
use Nemundo\Content\Type\AbstractContentType;
class CancelContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Cancel';
$this->typeId = '468077b7-ec83-4b67-adcb-2653ed4daaaf';
$this->formClassList[] = CancelContentForm::class;
$this->viewClassList[] = CancelContentView::class;
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