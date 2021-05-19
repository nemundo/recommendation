<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
use Nemundo\Model\Id\AbstractModelIdValue;
class CameraId extends AbstractModelIdValue {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
}