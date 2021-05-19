<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
use Nemundo\Model\Id\AbstractModelIdValue;
class LayoutColumnId extends AbstractModelIdValue {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
}