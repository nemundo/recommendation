<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateShareDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
}