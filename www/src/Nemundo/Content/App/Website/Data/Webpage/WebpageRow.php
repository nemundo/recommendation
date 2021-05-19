<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebpageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->title = $this->getModelValue($model->title);
$this->description = $this->getModelValue($model->description);
}
}