<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
use Nemundo\Model\Data\AbstractModelUpdate;
class EnclosureUpdate extends AbstractModelUpdate {
/**
* @var EnclosureModel
*/
public $model;

/**
* @var string
*/
public $feedItemId;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->feedItemId, $this->feedItemId);
parent::update();
}
}