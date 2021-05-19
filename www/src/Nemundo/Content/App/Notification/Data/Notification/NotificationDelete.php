<?php
namespace Nemundo\Content\App\Notification\Data\Notification;
class NotificationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
}