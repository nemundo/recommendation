<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RadioLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
}