<?php
namespace Nemundo\Content\App\Map\Content\GoogleMaps;
use Nemundo\Content\Form\AbstractContentForm;
class GoogleMapsContentForm extends AbstractContentForm {
/**
* @var GoogleMapsContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}