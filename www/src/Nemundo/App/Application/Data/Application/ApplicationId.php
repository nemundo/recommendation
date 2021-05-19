<?php
namespace Nemundo\App\Application\Data\Application;
use Nemundo\Model\Id\AbstractModelIdValue;
class ApplicationId extends AbstractModelIdValue {
/**
* @var ApplicationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
}