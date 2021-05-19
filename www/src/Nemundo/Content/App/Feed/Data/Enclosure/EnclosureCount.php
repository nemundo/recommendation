<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
}