<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebRadioModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $webRadio;

/**
* @var string
*/
public $streamUrl;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->webRadio = $this->getModelValue($model->webRadio);
$this->streamUrl = $this->getModelValue($model->streamUrl);
}
}