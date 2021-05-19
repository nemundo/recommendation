<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
use Nemundo\Model\Id\AbstractModelIdValue;
class SourceId extends AbstractModelIdValue {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
}