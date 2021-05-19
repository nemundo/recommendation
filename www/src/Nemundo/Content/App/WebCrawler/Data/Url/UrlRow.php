<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UrlModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $domainId;

/**
* @var \Nemundo\Content\App\WebCrawler\Data\Domain\DomainRow
*/
public $domain;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->domainId = intval($this->getModelValue($model->domainId));
if ($model->domain !== null) {
$this->loadNemundoContentAppWebCrawlerDataDomainDomaindomainRow($model->domain);
}
$this->url = $this->getModelValue($model->url);
$this->crawled = boolval($this->getModelValue($model->crawled));
$this->html = $this->getModelValue($model->html);
$this->title = $this->getModelValue($model->title);
$this->external = boolval($this->getModelValue($model->external));
$this->deep = intval($this->getModelValue($model->deep));
$this->statusCode = intval($this->getModelValue($model->statusCode));
}
private function loadNemundoContentAppWebCrawlerDataDomainDomaindomainRow($model) {
$this->domain = new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainRow($this->row, $model);
}
}