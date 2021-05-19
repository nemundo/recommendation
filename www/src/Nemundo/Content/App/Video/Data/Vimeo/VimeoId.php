<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
use Nemundo\Model\Id\AbstractModelIdValue;
class VimeoId extends AbstractModelIdValue {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
}