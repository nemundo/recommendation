<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
}