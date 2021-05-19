<?php
namespace Nemundo\Content\App\ToDo\Content\ToDoContainer;
use Nemundo\Content\Form\AbstractContentForm;
class ToDoContainerContentForm extends AbstractContentForm {
/**
* @var ToDoContainerContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}