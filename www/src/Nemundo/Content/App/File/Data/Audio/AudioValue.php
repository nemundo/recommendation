<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
}