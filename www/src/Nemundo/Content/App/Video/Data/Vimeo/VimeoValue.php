<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
}