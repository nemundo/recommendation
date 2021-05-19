<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
}