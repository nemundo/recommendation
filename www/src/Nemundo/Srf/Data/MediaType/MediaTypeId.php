<?php
namespace Nemundo\Srf\Data\MediaType;
use Nemundo\Model\Id\AbstractModelIdValue;
class MediaTypeId extends AbstractModelIdValue {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
}