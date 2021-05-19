<?php
namespace Nemundo\Content\Index\Search\Data\SearchLog;
class SearchLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $searchQuery;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $resultCount;

protected function loadModel() {
$this->tableName = "content_search_log";
$this->aliasTableName = "content_search_log";
$this->label = "Search Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_search_log";
$this->id->externalTableName = "content_search_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_search_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->searchQuery = new \Nemundo\Model\Type\Text\TextType($this);
$this->searchQuery->tableName = "content_search_log";
$this->searchQuery->externalTableName = "content_search_log";
$this->searchQuery->fieldName = "search_query";
$this->searchQuery->aliasFieldName = "content_search_log_search_query";
$this->searchQuery->label = "Search Query";
$this->searchQuery->allowNullValue = false;
$this->searchQuery->length = 255;

$this->resultCount = new \Nemundo\Model\Type\Number\NumberType($this);
$this->resultCount->tableName = "content_search_log";
$this->resultCount->externalTableName = "content_search_log";
$this->resultCount->fieldName = "result_count";
$this->resultCount->aliasFieldName = "content_search_log_result_count";
$this->resultCount->label = "Result Count";
$this->resultCount->allowNullValue = false;

}
}