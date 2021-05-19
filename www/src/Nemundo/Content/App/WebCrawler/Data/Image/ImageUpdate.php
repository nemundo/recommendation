<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageUpdate extends AbstractModelUpdate {
/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $urlId;

/**
* @var string
*/
public $imageUrl;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->urlId, $this->urlId);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
parent::update();
}
}