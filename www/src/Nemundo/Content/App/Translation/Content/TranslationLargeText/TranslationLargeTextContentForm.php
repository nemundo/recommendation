<?php
namespace Nemundo\Content\App\Translation\Content\TranslationLargeText;
use Nemundo\Content\Form\AbstractContentForm;
class TranslationLargeTextContentForm extends AbstractContentForm {
/**
* @var TranslationLargeTextContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}