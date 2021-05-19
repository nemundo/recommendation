<?php
namespace Nemundo\Content\Index\Search\Data\SearchIndex;
class SearchIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SearchIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var string
*/
public $wordId;

/**
* @var \Nemundo\Content\Index\Search\Data\Word\WordRow
*/
public $word;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $contentType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->wordId = $this->getModelValue($model->wordId);
if ($model->word !== null) {
$this->loadNemundoContentIndexSearchDataWordWordwordRow($model->word);
}
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentIndexSearchDataWordWordwordRow($model) {
$this->word = new \Nemundo\Content\Index\Search\Data\Word\WordRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}