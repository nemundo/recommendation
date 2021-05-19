<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
}