<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidget extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamWidgetModel
*/
protected $model;

/**
* @var int
*/
public $limit;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->limit, $this->limit);
$id = parent::save();
return $id;
}
}