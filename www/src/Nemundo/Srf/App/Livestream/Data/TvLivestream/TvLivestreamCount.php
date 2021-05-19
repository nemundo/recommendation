<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
}