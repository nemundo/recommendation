<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DomainModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $domain;

/**
* @var string
*/
public $url;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->domain = $this->getModelValue($model->domain);
$this->url = $this->getModelValue($model->url);
}
}