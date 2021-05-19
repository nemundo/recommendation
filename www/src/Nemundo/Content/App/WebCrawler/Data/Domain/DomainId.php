<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
use Nemundo\Model\Id\AbstractModelIdValue;
class DomainId extends AbstractModelIdValue {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
}