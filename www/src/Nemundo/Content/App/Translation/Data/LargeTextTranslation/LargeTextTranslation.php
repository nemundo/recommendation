<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslation extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LargeTextTranslationModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
public function save() {
$id = parent::save();
return $id;
}
}