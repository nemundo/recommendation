<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var IframeVideoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $sourceUrl;

/**
* @var string
*/
public $subject;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->sourceUrl = $this->getModelValue($model->sourceUrl);
$this->subject = $this->getModelValue($model->subject);
}
}