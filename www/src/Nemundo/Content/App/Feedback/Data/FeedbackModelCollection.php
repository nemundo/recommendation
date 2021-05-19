<?php
namespace Nemundo\Content\App\Feedback\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FeedbackModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Feedback\Data\Feedback\FeedbackModel());
}
}