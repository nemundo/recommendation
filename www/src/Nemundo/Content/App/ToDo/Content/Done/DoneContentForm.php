<?php
namespace Nemundo\Content\App\ToDo\Content\Done;
use Nemundo\Content\Form\AbstractContentForm;
class DoneContentForm extends AbstractContentForm {
/**
* @var DoneContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}