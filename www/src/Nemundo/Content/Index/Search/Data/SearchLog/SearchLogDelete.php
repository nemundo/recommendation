<?php
namespace Nemundo\Content\Index\Search\Data\SearchLog;
class SearchLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SearchLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchLogModel();
}
}