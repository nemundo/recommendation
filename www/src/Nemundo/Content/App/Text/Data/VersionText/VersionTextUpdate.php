<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
use Nemundo\Model\Data\AbstractModelUpdate;
class VersionTextUpdate extends AbstractModelUpdate {
/**
* @var VersionTextModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->versionText, $this->versionText);
$this->typeValueList->setModelValue($this->model->version, $this->version);
$this->typeValueList->setModelValue($this->model->textId, $this->textId);
parent::update();
}
}