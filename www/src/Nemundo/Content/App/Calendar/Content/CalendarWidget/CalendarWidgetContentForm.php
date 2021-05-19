<?php
namespace Nemundo\Content\App\Calendar\Content\CalendarWidget;
use Nemundo\Content\Form\AbstractContentForm;
class CalendarWidgetContentForm extends AbstractContentForm {
/**
* @var CalendarWidgetContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}