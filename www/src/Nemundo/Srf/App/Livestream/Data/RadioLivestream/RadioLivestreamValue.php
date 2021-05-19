<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RadioLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
}