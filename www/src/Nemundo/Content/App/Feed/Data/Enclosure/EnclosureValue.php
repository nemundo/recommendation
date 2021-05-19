<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
}