<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RadioLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
}