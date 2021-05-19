<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
}