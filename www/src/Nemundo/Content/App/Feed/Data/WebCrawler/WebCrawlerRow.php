<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebCrawlerModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $phpClass;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->phpClass = $this->getModelValue($model->phpClass);
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
}