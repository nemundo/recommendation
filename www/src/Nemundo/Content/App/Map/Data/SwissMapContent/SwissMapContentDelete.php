<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
}