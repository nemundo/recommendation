<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class ImageIndexId extends AbstractModelIdValue {
/**
* @var ImageIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
}
}