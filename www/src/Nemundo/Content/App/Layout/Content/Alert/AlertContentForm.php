<?php
namespace Nemundo\Content\App\Layout\Content\Alert;
use Nemundo\Content\Form\AbstractContentForm;
class AlertContentForm extends AbstractContentForm {
/**
* @var AlertContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}