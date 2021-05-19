<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TvLivestreamModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
public function save() {
$id = parent::save();
return $id;
}
}