<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
}