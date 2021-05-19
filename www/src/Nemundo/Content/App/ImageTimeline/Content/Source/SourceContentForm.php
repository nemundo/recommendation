<?php
namespace Nemundo\Content\App\ImageTimeline\Content\Source;
use Nemundo\Content\Form\AbstractContentForm;
class SourceContentForm extends AbstractContentForm {
/**
* @var SourceContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}