<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ShowWidgetModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $showId;

/**
* @var \Nemundo\Srf\Data\Show\ShowRow
*/
public $show;

/**
* @var int
*/
public $showLimit;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->showId = intval($this->getModelValue($model->showId));
if ($model->show !== null) {
$this->loadNemundoSrfDataShowShowshowRow($model->show);
}
$this->showLimit = intval($this->getModelValue($model->showLimit));
}
private function loadNemundoSrfDataShowShowshowRow($model) {
$this->show = new \Nemundo\Srf\Data\Show\ShowRow($this->row, $model);
}
}