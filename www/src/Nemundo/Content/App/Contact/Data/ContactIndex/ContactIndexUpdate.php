<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContactIndexUpdate extends AbstractModelUpdate {
/**
* @var ContactIndexModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $company;

/**
* @var string
*/
public $lastName;

/**
* @var string
*/
public $firstName;

/**
* @var string
*/
public $phone;

/**
* @var string
*/
public $email;

/**
* @var string
*/
public $sourceId;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->company, $this->company);
$this->typeValueList->setModelValue($this->model->lastName, $this->lastName);
$this->typeValueList->setModelValue($this->model->firstName, $this->firstName);
$this->typeValueList->setModelValue($this->model->phone, $this->phone);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
parent::update();
}
}