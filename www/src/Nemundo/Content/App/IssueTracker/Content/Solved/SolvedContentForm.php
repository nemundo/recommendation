<?php
namespace Nemundo\Content\App\IssueTracker\Content\Solved;
use Nemundo\Content\Form\AbstractContentForm;
class SolvedContentForm extends AbstractContentForm {
/**
* @var SolvedContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}