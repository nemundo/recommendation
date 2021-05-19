<?php


namespace Nemundo\Content\App\Contact\Type;


use Nemundo\Content\App\Contact\Data\ContactIndex\ContactIndex;

trait ContactIndexTrait
{

    abstract protected function getCompany();

    abstract protected function getLastName();

    abstract protected function getFirstName();

    abstract protected function getEmail();

    abstract protected function getPhone();


    protected function saveContactIndex()
    {

        $data = new ContactIndex();
        $data->updateOnDuplicate = true;
        $data->sourceId = $this->getParentId();
        $data->contentId = $this->getContentId();
        $data->company = $this->getCompany();
        $data->firstName = $this->getFirstName();
        $data->lastName = $this->getLastName();
        $data->phone = $this->getPhone();
        $data->email = $this->getEmail();
        $data->save();

        $this->addSearchText($this->getLastName());
        $this->addSearchText($this->getFirstName());


    }


}