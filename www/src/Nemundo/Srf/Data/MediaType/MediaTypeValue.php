<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
}