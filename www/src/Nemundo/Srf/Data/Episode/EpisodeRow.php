<?php
namespace Nemundo\Srf\Data\Episode;
class EpisodeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var EpisodeModel
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
* @var string
*/
public $urn;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $length;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->showId = intval($this->getModelValue($model->showId));
if ($model->show !== null) {
$this->loadNemundoSrfDataShowShowshowRow($model->show);
}
$this->urn = $this->getModelValue($model->urn);
$this->title = $this->getModelValue($model->title);
$this->description = $this->getModelValue($model->description);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->length = intval($this->getModelValue($model->length));
}
private function loadNemundoSrfDataShowShowshowRow($model) {
$this->show = new \Nemundo\Srf\Data\Show\ShowRow($this->row, $model);
}
}