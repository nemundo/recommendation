<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
class ImageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
}