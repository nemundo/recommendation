<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebcamImageId extends AbstractModelIdValue {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
}