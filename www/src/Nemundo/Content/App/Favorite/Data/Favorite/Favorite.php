<?php
namespace Nemundo\Content\App\Favorite\Data\Favorite;
class Favorite extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FavoriteModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}