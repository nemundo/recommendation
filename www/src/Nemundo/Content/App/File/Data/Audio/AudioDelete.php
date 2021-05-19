<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
}