<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DownloadJobModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $done;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->url = $this->getModelValue($model->url);
$this->done = boolval($this->getModelValue($model->done));
}
}