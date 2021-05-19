<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class Translation extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TranslationModel
*/
protected $model;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$id = parent::save();
return $id;
}
}