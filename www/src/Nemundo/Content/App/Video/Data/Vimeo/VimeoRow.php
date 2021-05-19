<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var VimeoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $vimeoId;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->vimeoId = $this->getModelValue($model->vimeoId);
}
}