<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
}