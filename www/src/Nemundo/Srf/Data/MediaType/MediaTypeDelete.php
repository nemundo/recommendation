<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
}