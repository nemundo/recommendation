<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
}