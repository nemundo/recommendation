<?php


namespace Nemundo\Content\App\UserProfile\Content\UserProfile;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfilePaginationReader;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class UserProfileContentAdmin extends AbstractContentAdmin
{


    protected function loadAdmin()
    {
        // TODO: Implement loadAdmin() method.
    }


    protected function loadIndex()
    {

        $table = new AdminClickableTable($this);

        $reader = new UserProfilePaginationReader();
        $reader->model->loadUser();

        $header = new TableHeader($table);
        $header->addText($reader->model->lastName->label);
        $header->addText($reader->model->firstName->label);
        $header->addText($reader->model->user->login->label);

        foreach ($reader->getData() as $userProfileRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($userProfileRow->lastName);
            $row->addText($userProfileRow->firstName);
            $row->addText($userProfileRow->user->login);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $reader;


    }

}