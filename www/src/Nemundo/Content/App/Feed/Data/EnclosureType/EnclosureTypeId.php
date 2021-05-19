<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
use Nemundo\Model\Id\AbstractModelIdValue;
class EnclosureTypeId extends AbstractModelIdValue {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
}