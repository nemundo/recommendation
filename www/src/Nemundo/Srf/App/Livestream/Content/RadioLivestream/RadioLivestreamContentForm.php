<?php
namespace Nemundo\Srf\App\Livestream\Content\RadioLivestream;
use Nemundo\Content\Form\AbstractContentForm;
class RadioLivestreamContentForm extends AbstractContentForm {
/**
* @var RadioLivestreamContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}