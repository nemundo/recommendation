<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
}