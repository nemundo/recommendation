<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var VersionTextModel
*/
protected $model;

/**
* @var string
*/
public $versionText;

/**
* @var int
*/
public $version;

/**
* @var string
*/
public $textId;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->versionText, $this->versionText);
$this->typeValueList->setModelValue($this->model->version, $this->version);
$this->typeValueList->setModelValue($this->model->textId, $this->textId);
$id = parent::save();
return $id;
}
}