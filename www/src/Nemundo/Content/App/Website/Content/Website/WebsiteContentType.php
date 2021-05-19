<?php
namespace Nemundo\Content\App\Website\Content\Website;

use Nemundo\Content\Type\AbstractContentType;

class WebsiteContentType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Website';
$this->typeId = '0918a8a1-9c64-426b-a529-8cd440cdf1c8';
$this->formClassList[] = WebsiteContentForm::class;
$this->viewClassList[]  = WebsiteContentView::class;
}
protected function onCreate() {
}
protected function onUpdate() {
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