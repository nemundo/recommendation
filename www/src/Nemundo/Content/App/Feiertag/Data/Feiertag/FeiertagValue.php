<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
}