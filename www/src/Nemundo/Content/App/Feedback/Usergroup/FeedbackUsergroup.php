<?php
namespace Nemundo\Content\App\Feedback\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class FeedbackUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'Feedback';
$this->usergroupId = 'b4ad33e1-fc0b-488d-bc7a-c3fec35e271d';
}
}