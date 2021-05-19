<?php
namespace Nemundo\Content\App\SystemLog\Content\SystemLog;
use Nemundo\Content\Form\AbstractContentForm;
class SystemLogContentForm extends AbstractContentForm {
/**
* @var SystemLogContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}