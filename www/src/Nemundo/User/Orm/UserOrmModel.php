<?php

namespace Nemundo\User\Orm;

use Nemundo\Model\Definition\Index\ModelIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Model\Definition\Model\ModelTrait\ActiveModelTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;


class UserOrmModel extends AbstractOrmModel
{

    use ActiveModelTrait;

    /**
     * @var TextOrmType
     */
    public $login;

    /**
     * @var TextOrmType
     */
    public $password;

    /**
     * @var TextOrmType
     */
    public $email;

    /**
     * @var TextOrmType
     */
    public $displayName;

    /**
     * @var TextOrmType
     */
    public $secureToken;


    protected function loadModel()
    {

        $this->templateLabel = 'User Model';
        $this->templateName = 'user';
        $this->templateId = '498d5a54-55e8-47c6-9832-9382347e2681';
        //$this->templateExtendsClass = UserModel::class;
        $this->tableName = 'user_user';

        $this->loadActiveModelTrait();

        $this->login = new TextOrmType($this);
        $this->login->fieldName = 'login';
        $this->login->variableName = 'login';
        $this->login->label = 'Login';
        $this->login->isEditable = false;

        $this->password = new TextOrmType($this);
        $this->password->fieldName = 'password';
        $this->password->variableName = 'password';
        $this->password->label = 'Passwort';
        $this->password->allowNullValue=true;
        $this->password->isEditable = false;

        $this->email = new TextOrmType($this);
        $this->email->fieldName = 'email';
        $this->email->variableName = 'email';
        $this->email->label = 'eMail';
        $this->email->allowNullValue=true;
        $this->email->isEditable = false;

        $this->displayName = new TextOrmType($this);
        $this->displayName->fieldName = 'display_name';
        $this->displayName->variableName = 'displayName';
        $this->displayName->label = 'Display Name';
        $this->displayName->isEditable = false;

        $this->secureToken = new TextOrmType($this);
        $this->secureToken->fieldName = 'secure_token';
        $this->secureToken->variableName = 'secureToken';
        $this->secureToken->label = 'Secure Token';
        $this->secureToken->isEditable = false;

        $this->addDefaultType($this->displayName);
        $this->addDefaultOrderType($this->login);

        $index = new ModelUniqueIndex($this);
        $index->indexName = 'login';
        $index->isEditable = false;
        $index->addType($this->login);

        $index = new ModelIndex($this);
        $index->indexName = 'secure_token';
        $index->isEditable = false;
        $index->addType($this->secureToken);

    }

}