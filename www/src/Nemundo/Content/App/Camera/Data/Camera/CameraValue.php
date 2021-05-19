<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
}