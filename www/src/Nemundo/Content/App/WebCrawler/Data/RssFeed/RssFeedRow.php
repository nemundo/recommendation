<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeedRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RssFeedModel
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
public $rssUrl;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->domainId = intval($this->getModelValue($model->domainId));
if ($model->domain !== null) {
$this->loadNemundoContentAppWebCrawlerDataDomainDomaindomainRow($model->domain);
}
$this->rssUrl = $this->getModelValue($model->rssUrl);
}
private function loadNemundoContentAppWebCrawlerDataDomainDomaindomainRow($model) {
$this->domain = new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainRow($this->row, $model);
}
}