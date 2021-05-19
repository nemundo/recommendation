<?php
namespace Nemundo\Content\App\Layout\Content\Alert;
use Nemundo\Content\Type\AbstractContentType;
class AlertContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Alert';
$this->typeId = 'ed75b0ad-5e57-44a3-b571-459ad0632957';
$this->formClassList[] = AlertContentForm::class;
$this->viewClassList[] = AlertContentView::class;
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