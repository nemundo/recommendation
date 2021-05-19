<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
use Nemundo\Model\Data\AbstractModelUpdate;
class TranslationUpdate extends AbstractModelUpdate {
/**
* @var TranslationModel
*/
public $model;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}