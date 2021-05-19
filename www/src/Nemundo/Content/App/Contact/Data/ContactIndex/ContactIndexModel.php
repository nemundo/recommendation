<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $sourceId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $source;

protected function loadModel() {
$this->tableName = "contact_contact_index";
$this->aliasTableName = "contact_contact_index";
$this->label = "Contact Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "contact_contact_index";
$this->id->externalTableName = "contact_contact_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "contact_contact_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "contact_contact_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "contact_contact_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->company = new \Nemundo\Model\Type\Text\TextType($this);
$this->company->tableName = "contact_contact_index";
$this->company->externalTableName = "contact_contact_index";
$this->company->fieldName = "company";
$this->company->aliasFieldName = "contact_contact_index_company";
$this->company->label = "Company";
$this->company->allowNullValue = true;
$this->company->length = 255;

$this->lastName = new \Nemundo\Model\Type\Text\TextType($this);
$this->lastName->tableName = "contact_contact_index";
$this->lastName->externalTableName = "contact_contact_index";
$this->lastName->fieldName = "last_name";
$this->lastName->aliasFieldName = "contact_contact_index_last_name";
$this->lastName->label = "Last Name";
$this->lastName->allowNullValue = true;
$this->lastName->length = 255;

$this->firstName = new \Nemundo\Model\Type\Text\TextType($this);
$this->firstName->tableName = "contact_contact_index";
$this->firstName->externalTableName = "contact_contact_index";
$this->firstName->fieldName = "first_name";
$this->firstName->aliasFieldName = "contact_contact_index_first_name";
$this->firstName->label = "First Name";
$this->firstName->allowNullValue = true;
$this->firstName->length = 255;

$this->phone = new \Nemundo\Model\Type\Text\TextType($this);
$this->phone->tableName = "contact_contact_index";
$this->phone->externalTableName = "contact_contact_index";
$this->phone->fieldName = "phone";
$this->phone->aliasFieldName = "contact_contact_index_phone";
$this->phone->label = "Phone";
$this->phone->allowNullValue = true;
$this->phone->length = 255;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "contact_contact_index";
$this->email->externalTableName = "contact_contact_index";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "contact_contact_index_email";
$this->email->label = "Email";
$this->email->allowNullValue = true;
$this->email->length = 255;

$this->sourceId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->sourceId->tableName = "contact_contact_index";
$this->sourceId->fieldName = "source";
$this->sourceId->aliasFieldName = "contact_contact_index_source";
$this->sourceId->label = "Source";
$this->sourceId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "contact_contact_index_content");
$this->content->tableName = "contact_contact_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "contact_contact_index_content";
$this->content->label = "Content";
}
return $this;
}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\Content\Data\Content\ContentExternalType($this, "contact_contact_index_source");
$this->source->tableName = "contact_contact_index";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "contact_contact_index_source";
$this->source->label = "Source";
}
return $this;
}
}