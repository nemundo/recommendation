<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
}