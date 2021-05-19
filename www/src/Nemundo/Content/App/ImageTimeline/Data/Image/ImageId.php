<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Image;
use Nemundo\Model\Id\AbstractModelIdValue;
class ImageId extends AbstractModelIdValue {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
}