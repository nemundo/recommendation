<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
}