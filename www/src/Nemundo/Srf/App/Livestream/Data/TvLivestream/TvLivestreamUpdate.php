<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
use Nemundo\Model\Data\AbstractModelUpdate;
class TvLivestreamUpdate extends AbstractModelUpdate {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
public function update() {
parent::update();
}
}