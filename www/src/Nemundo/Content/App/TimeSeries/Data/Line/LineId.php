<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
use Nemundo\Model\Id\AbstractModelIdValue;
class LineId extends AbstractModelIdValue {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
}