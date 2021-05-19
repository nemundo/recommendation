<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
}