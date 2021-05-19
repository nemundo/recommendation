<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
use Nemundo\Model\Data\AbstractModelUpdate;
class RadioLivestreamUpdate extends AbstractModelUpdate {
/**
* @var RadioLivestreamModel
*/
public $model;

/**
* @var string
*/
public $livestream;

/**
* @var string
*/
public $urn;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->livestream, $this->livestream);
$this->typeValueList->setModelValue($this->model->urn, $this->urn);
parent::update();
}
}