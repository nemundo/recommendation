<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TopicModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $projectId;

/**
* @var \Nemundo\App\Help\Data\Project\ProjectRow
*/
public $project;

/**
* @var string
*/
public $topic;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->projectId = intval($this->getModelValue($model->projectId));
if ($model->project !== null) {
$this->loadNemundoAppHelpDataProjectProjectprojectRow($model->project);
}
$this->topic = $this->getModelValue($model->topic);
}
private function loadNemundoAppHelpDataProjectProjectprojectRow($model) {
$this->project = new \Nemundo\App\Help\Data\Project\ProjectRow($this->row, $model);
}
}