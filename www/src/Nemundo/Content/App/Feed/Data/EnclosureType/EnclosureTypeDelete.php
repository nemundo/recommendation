<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
}