<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
}