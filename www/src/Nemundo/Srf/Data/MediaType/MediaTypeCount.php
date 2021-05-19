<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
}