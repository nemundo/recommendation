<?php
namespace Nemundo\Content\App\Website\Content\Website;
use Nemundo\Content\Form\AbstractContentForm;
class WebsiteContentForm extends AbstractContentForm {
/**
* @var WebsiteContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}