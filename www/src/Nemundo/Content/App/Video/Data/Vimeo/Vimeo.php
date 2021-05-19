<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class Vimeo extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var VimeoModel
*/
protected $model;

/**
* @var string
*/
public $vimeoId;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->vimeoId, $this->vimeoId);
$id = parent::save();
return $id;
}
}