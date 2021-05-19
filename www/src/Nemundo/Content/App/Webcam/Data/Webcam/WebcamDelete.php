<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
}