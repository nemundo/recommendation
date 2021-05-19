<?php
namespace Nemundo\Content\App\ToDo\Content\ToDoContainer;
use Nemundo\Content\Type\AbstractContentType;
class ToDoContainerContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'ToDoContainer';
$this->typeId = '8b8a11b8-f49f-4373-b92e-a9d3b42bae13';
$this->formClassList[] = ToDoContainerContentForm::class;
$this->viewClassList[] = ToDoContainerContentView::class;
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