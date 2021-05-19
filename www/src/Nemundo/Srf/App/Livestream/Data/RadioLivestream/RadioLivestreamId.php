<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
use Nemundo\Model\Id\AbstractModelIdValue;
class RadioLivestreamId extends AbstractModelIdValue {
/**
* @var RadioLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
}