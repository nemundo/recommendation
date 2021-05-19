<?php
namespace Nemundo\Content\App\WebCrawler\Content\Domain;
use Nemundo\Content\Type\AbstractContentType;
class DomainContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Domain';
$this->typeId = '217d9bff-33f6-40bf-a943-2c5a53047b62';
$this->formClassList[] = DomainContentForm::class;
$this->viewClassList[] = DomainContentView::class;
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