<?php
namespace Nemundo\Content\App\File\Data\Audio;
use Nemundo\Model\Id\AbstractModelIdValue;
class AudioId extends AbstractModelIdValue {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
}