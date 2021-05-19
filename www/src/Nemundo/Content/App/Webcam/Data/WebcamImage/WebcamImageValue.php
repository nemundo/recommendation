<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
}