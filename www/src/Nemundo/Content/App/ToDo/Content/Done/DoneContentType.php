<?php
namespace Nemundo\Content\App\ToDo\Content\Done;
use Nemundo\Content\Type\AbstractContentType;
class DoneContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Done';
$this->typeId = '03ef7a2a-2fe3-4b26-8ca3-1ea3d1f91133';
$this->formClassList[] = DoneContentForm::class;
$this->viewClassList[] = DoneContentView::class;
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