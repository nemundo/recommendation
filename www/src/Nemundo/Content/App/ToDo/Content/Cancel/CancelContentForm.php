<?php
namespace Nemundo\Content\App\ToDo\Content\Cancel;
use Nemundo\Content\Form\AbstractContentForm;
class CancelContentForm extends AbstractContentForm {
/**
* @var CancelContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}