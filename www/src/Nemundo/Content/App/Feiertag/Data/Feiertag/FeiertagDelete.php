<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
}