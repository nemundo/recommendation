<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeTextTranslationUpdate extends AbstractModelUpdate {
/**
* @var LargeTextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
public function update() {
parent::update();
}
}