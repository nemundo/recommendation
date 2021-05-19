<?php
namespace Nemundo\Srf\App\Livestream\Content\TvLivestream;
use Nemundo\Content\Form\AbstractContentForm;
class TvLivestreamContentForm extends AbstractContentForm {
/**
* @var TvLivestreamContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}