<?php


namespace Nemundo\App\UserAdmin\Page;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\UserAdmin\Site\UserDeleteSite;
use Nemundo\App\UserAdmin\Site\UserEditSite;
use Nemundo\App\UserAdmin\Site\UserNewSite;
use Nemundo\App\UserAdmin\Site\PasswordChangeSite;
use Nemundo\App\UserAdmin\Template\UserAdminTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\User\Data\User\UserPaginationReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Parameter\UserParameter;

class UserAdminPage extends UserAdminTemplate
{

    public function getContent()
    {

        $searchForm = new SearchForm($this);

        $formRow = new BootstrapRow($searchForm);

        $text = new BootstrapTextBox($formRow);
        $text->name = 'q';
        $text->value = $text->getValue();
        $text->column=true;
        $text->columnSize=3;

        new AdminSearchButton($formRow);


        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Active');
        $header->addText('Login');
        $header->addText('eMail');
        $header->addText('Display Name');
        $header->addText('Usergroup');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        $userReader = new UserPaginationReader();
        $userReader->addOrder($userReader->model->login);

        $q = $text->getValue();
        if ($q !== '') {
            $userReader->filter->orContains($userReader->model->login, $text->getValue());
        }


        foreach ($userReader->getData() as $userRow) {

            $row = new TableRow($table);
            $row->addYesNo($userRow->active);
            $row->addText($userRow->login);

            $email = new EmailHyperlink($row);
            $email->email = $userRow->email;

            $row->addText($userRow->displayName);

            $userUsergroupReader = new UserUsergroupReader();
            $userUsergroupReader->model->loadUser();
            $userUsergroupReader->model->loadUsergroup();
            $userUsergroupReader->filter->andEqual($userUsergroupReader->model->userId, $userRow->id);

            $usergroup = new TextDirectory();
            foreach ($userUsergroupReader->getData() as $userUsergroupRow) {
                $usergroup->addValue($userUsergroupRow->usergroup->usergroup);
            }

            $row->addText($usergroup->getTextWithSeperator());

            $userParameter = new UserParameter($userRow->id);

            $site = clone(PasswordChangeSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

            $site = clone(UserEditSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

            $site = clone(UserDeleteSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $userReader;

        return parent::getContent();

    }

}