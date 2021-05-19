<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
class ImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $urlId;

/**
* @var \Nemundo\Content\App\WebCrawler\Data\Url\UrlRow
*/
public $url;

/**
* @var string
*/
public $imageUrl;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->urlId = intval($this->getModelValue($model->urlId));
if ($model->url !== null) {
$this->loadNemundoContentAppWebCrawlerDataUrlUrlurlRow($model->url);
}
$this->imageUrl = $this->getModelValue($model->imageUrl);
}
private function loadNemundoContentAppWebCrawlerDataUrlUrlurlRow($model) {
$this->url = new \Nemundo\Content\App\WebCrawler\Data\Url\UrlRow($this->row, $model);
}
}