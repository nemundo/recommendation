<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestream extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RadioLivestreamModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->livestream, $this->livestream);
$this->typeValueList->setModelValue($this->model->urn, $this->urn);
$id = parent::save();
return $id;
}
}