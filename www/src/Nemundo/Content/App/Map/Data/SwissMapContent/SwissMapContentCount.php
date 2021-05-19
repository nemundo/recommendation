<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
}