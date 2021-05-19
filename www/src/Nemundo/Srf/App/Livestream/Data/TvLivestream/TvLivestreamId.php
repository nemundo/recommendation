<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
use Nemundo\Model\Id\AbstractModelIdValue;
class TvLivestreamId extends AbstractModelIdValue {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
}