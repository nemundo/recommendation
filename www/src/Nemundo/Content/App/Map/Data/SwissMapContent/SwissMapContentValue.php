<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
}