<?php
namespace Nemundo\Content\App\IssueTracker\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class IssueTrackerModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\IssueTracker\Data\Issue\IssueModel());
$this->addModel(new \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityModel());
}
}