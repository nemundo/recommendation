<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $company;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $lastName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firstName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phone;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $sourceId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $source;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContactIndexModel::class;
$this->externalTableName = "contact_contact_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->company = new \Nemundo\Model\Type\Text\TextType();
$this->company->fieldName = "company";
$this->company->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->company->externalTableName = $this->externalTableName;
$this->company->aliasFieldName = $this->company->tableName . "_" . $this->company->fieldName;
$this->company->label = "Company";
$this->addType($this->company);

$this->lastName = new \Nemundo\Model\Type\Text\TextType();
$this->lastName->fieldName = "last_name";
$this->lastName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lastName->externalTableName = $this->externalTableName;
$this->lastName->aliasFieldName = $this->lastName->tableName . "_" . $this->lastName->fieldName;
$this->lastName->label = "Last Name";
$this->addType($this->lastName);

$this->firstName = new \Nemundo\Model\Type\Text\TextType();
$this->firstName->fieldName = "first_name";
$this->firstName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firstName->externalTableName = $this->externalTableName;
$this->firstName->aliasFieldName = $this->firstName->tableName . "_" . $this->firstName->fieldName;
$this->firstName->label = "First Name";
$this->addType($this->firstName);

$this->phone = new \Nemundo\Model\Type\Text\TextType();
$this->phone->fieldName = "phone";
$this->phone->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phone->externalTableName = $this->externalTableName;
$this->phone->aliasFieldName = $this->phone->tableName . "_" . $this->phone->fieldName;
$this->phone->label = "Phone";
$this->addType($this->phone);

$this->email = new \Nemundo\Model\Type\Text\TextType();
$this->email->fieldName = "email";
$this->email->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->email->externalTableName = $this->externalTableName;
$this->email->aliasFieldName = $this->email->tableName . "_" . $this->email->fieldName;
$this->email->label = "Email";
$this->addType($this->email);

$this->sourceId = new \Nemundo\Model\Type\Id\IdType();
$this->sourceId->fieldName = "source";
$this->sourceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceId->aliasFieldName = $this->sourceId->tableName ."_".$this->sourceId->fieldName;
$this->sourceId->label = "Source";
$this->addType($this->sourceId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_source");
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName ."_".$this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);
}
return $this;
}
}