<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
}