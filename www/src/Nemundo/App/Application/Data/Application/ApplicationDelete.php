<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ApplicationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
}