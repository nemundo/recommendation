<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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