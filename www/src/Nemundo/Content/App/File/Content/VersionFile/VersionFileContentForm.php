<?php
namespace Nemundo\Content\App\File\Content\VersionFile;
use Nemundo\Content\Form\AbstractContentForm;
class VersionFileContentForm extends AbstractContentForm {
/**
* @var VersionFileContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}