<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
}