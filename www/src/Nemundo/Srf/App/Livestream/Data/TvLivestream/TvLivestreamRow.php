<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TvLivestreamModel
*/
public $model;

/**
* @var string
*/
public $id;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
}
}