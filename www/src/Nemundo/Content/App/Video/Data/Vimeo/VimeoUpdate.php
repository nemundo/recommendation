<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
use Nemundo\Model\Data\AbstractModelUpdate;
class VimeoUpdate extends AbstractModelUpdate {
/**
* @var VimeoModel
*/
public $model;

/**
* @var string
*/
public $vimeoId;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->vimeoId, $this->vimeoId);
parent::update();
}
}