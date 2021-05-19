<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
}