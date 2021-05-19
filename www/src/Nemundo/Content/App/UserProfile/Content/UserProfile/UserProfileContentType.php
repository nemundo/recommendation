<?php

namespace Nemundo\Content\App\UserProfile\Content\UserProfile;

use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfile;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileDelete;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileId;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileReader;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileRow;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileUpdate;
use Nemundo\Content\App\UserProfile\Mail\UserProfileMailContainer;
use Nemundo\Content\App\UserProfile\Usergroup\DefaultUsergroup;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\User\Builder\UserBuilder;


// UserProfileGroupContentType
class UserProfileContentType extends AbstractContentType
{

    //use GroupIndexTrait;

    public $lastName;

    public $firstName;

    public $email;

    /**
     * @var bool
     */
    public $sendEmail=true;

    protected function loadContentType()
    {
        $this->typeLabel = 'User Profile';
        $this->typeId = '19df1ba8-92b3-4bb3-913f-0337fea0f21a';
        $this->formClassList[] = UserProfileContentForm::class;
        $this->viewClassList[]  = UserProfileContentView::class;
        $this->adminClass=UserProfileContentAdmin::class;
    }


    public function fromUserId($userId) {

        $id= new UserProfileId();
        $id->model->loadUser();
        $id->filter->andEqual($id->model->userId,$userId);
        $this->fromDataId($id->getId());

        return $this;

    }


    public function fromEmail($email) {

        $id= new UserProfileId();
        $id->model->loadUser();
        $id->filter->andEqual($id->model->user->login,$email);
        $this->fromDataId($id->getId());

        return $this;


    }



    protected function onCreate()
    {

        $builder= new UserBuilder();
        $builder->email=$this->email;
        $builder->login=$this->email;
        $userId=$builder->createUser();

        if ($this->sendEmail) {
        $builder->sendMail(new UserProfileMailContainer());
        }

        (new DefaultUsergroup())->addUser($userId);

        $data=new UserProfile();
        $data->userId=$userId;
        $data->lastName=$this->lastName;
        $data->firstName=$this->firstName;
        $this->dataId=$data->save();

        //$this->addUser($userId);  //$this->getDataId());

    }

    protected function onUpdate()
    {

        $update=new UserProfileUpdate();
        $update->lastName=$this->lastName;
        $update->firstName=$this->firstName;
        $update->updateById($this->dataId);
        
    }


    protected function onIndex()
    {

        $this->saveGroupIndex();
        $this->addUser($this->getDataRow()->userId);

    }


    protected function onDelete()
    {

        (new UserBuilder($this->getDataRow()->userId))->deleteUser();
        $this->deleteGroupIndex();
        (new UserProfileDelete())->deleteById($this->dataId);

    }


    protected function onDataRow()
    {
        $reader= new UserProfileReader();
        $reader->model->loadUser();
        $this->dataRow= $reader->getRowById($this->dataId);

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|UserProfileRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->user->login;
    }


    public function getGroupLabel()
    {

        $label=$this->getDataRow()->lastName.' '.$this->getDataRow()->firstName;
        return $label;

    }


}