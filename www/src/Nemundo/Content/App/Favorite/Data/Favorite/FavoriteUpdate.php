<?php
namespace Nemundo\Content\App\Favorite\Data\Favorite;
use Nemundo\Model\Data\AbstractModelUpdate;
class FavoriteUpdate extends AbstractModelUpdate {
/**
* @var FavoriteModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new FavoriteModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}