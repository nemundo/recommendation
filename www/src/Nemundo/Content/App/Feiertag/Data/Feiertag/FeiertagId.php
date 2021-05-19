<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
use Nemundo\Model\Id\AbstractModelIdValue;
class FeiertagId extends AbstractModelIdValue {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
}