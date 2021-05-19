<?php
namespace Nemundo\Content\App\IssueTracker\Content\IssueContainer;
use Nemundo\Content\Form\AbstractContentForm;
class IssueContainerContentForm extends AbstractContentForm {
/**
* @var IssueContainerContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}