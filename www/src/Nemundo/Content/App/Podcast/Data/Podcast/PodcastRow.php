<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
class PodcastRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PodcastModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $rssUrl;

/**
* @var string
*/
public $podcast;

/**
* @var string
*/
public $description;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->rssUrl = $this->getModelValue($model->rssUrl);
$this->podcast = $this->getModelValue($model->podcast);
$this->description = $this->getModelValue($model->description);
}
}