<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ApplicationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
}