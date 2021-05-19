<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var EnclosureModel
*/
protected $model;

/**
* @var string
*/
public $feedItemId;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->feedItemId, $this->feedItemId);
$id = parent::save();
return $id;
}
}