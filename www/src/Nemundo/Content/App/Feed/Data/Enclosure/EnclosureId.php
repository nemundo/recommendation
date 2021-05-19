<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
use Nemundo\Model\Id\AbstractModelIdValue;
class EnclosureId extends AbstractModelIdValue {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
}