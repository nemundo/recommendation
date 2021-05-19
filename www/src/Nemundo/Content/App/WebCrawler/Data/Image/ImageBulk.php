<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
class ImageBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ImageModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->urlId, $this->urlId);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$id = parent::save();
return $id;
}
}