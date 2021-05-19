<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
use Nemundo\Model\Id\AbstractModelIdValue;
class SwissMapContentId extends AbstractModelIdValue {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
}