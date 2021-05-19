<?php
namespace Nemundo\Content\App\Contact\Content\Email;
use Nemundo\Content\Form\AbstractContentForm;
class EmailContentForm extends AbstractContentForm {
/**
* @var EmailContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}