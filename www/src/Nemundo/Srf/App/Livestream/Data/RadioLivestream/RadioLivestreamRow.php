<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RadioLivestreamModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $livestream;

/**
* @var string
*/
public $urn;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->livestream = $this->getModelValue($model->livestream);
$this->urn = $this->getModelValue($model->urn);
}
}