<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
use Nemundo\Model\Id\AbstractModelIdValue;
class LargeTextId extends AbstractModelIdValue {
/**
* @var LargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
}