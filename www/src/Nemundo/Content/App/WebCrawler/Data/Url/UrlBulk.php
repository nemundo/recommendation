<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UrlModel
*/
protected $model;

/**
* @var string
*/
public $domainId;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $crawled;

/**
* @var string
*/
public $html;

/**
* @var string
*/
public $title;

/**
* @var bool
*/
public $external;

/**
* @var int
*/
public $deep;

/**
* @var int
*/
public $statusCode;

public function __construct() {
parent::__construct();
$this->model = new UrlModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->domainId, $this->domainId);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->crawled, $this->crawled);
$this->typeValueList->setModelValue($this->model->html, $this->html);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->external, $this->external);
$this->typeValueList->setModelValue($this->model->deep, $this->deep);
$this->typeValueList->setModelValue($this->model->statusCode, $this->statusCode);
$id = parent::save();
return $id;
}
}