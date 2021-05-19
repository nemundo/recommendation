<?php

namespace Nemundo\User\Com\ListBox;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Parameter\UserParameter;

class UserListBox extends BootstrapListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->label[LanguageCode::EN] = 'User';
        $this->label[LanguageCode::DE] = 'Benutzer';

        $this->name = (new UserParameter())->getParameterName();

    }

    public function getContent()
    {

        $userReader = new UserReader();
        $userReader->filter->andEqual($userReader->model->active, true);
        $userReader->addOrder($userReader->model->login);
        foreach ($userReader->getData() as $userRow) {
            //$this->addItem($userRow->id, $userRow->login);
            $this->addItem($userRow->id, $userRow->displayName);
        }

        return parent::getContent();

    }

}