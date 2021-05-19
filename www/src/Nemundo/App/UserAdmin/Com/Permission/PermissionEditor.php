<?php

namespace Nemundo\App\UserAdmin\Com\Permission;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\UserAdmin\Parameter\UserUsergroupParameter;
use Nemundo\App\UserAdmin\Site\Delete\UserUsergroupDeleteSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Filter\Filter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\User\Data\Usergroup\UsergroupCount;
use Nemundo\User\Data\Usergroup\UsergroupId;
use Nemundo\User\Data\Usergroup\UsergroupModel;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\User\Usergroup\AbstractUsergroupCollection;
use Nemundo\Web\Site\Site;

class PermissionEditor extends AbstractHtmlContainer
{

    /**
     * @var AbstractApplication
     */
    public $application;

    /**
     * @var AbstractUsergroup[]
     */
    private $usergroupList = [];


    public function addUsergroup(AbstractUsergroup $usergroup)
    {
        $this->usergroupList[] = $usergroup;
        return $this;
    }

    public function addUsergroupCollection(AbstractUsergroupCollection $usergroupCollection)
    {

        foreach ($usergroupCollection->getUsergroup() as $usergroup) {
            $this->addUsergroup($usergroup);
        }

    }


    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;


        $model = new UsergroupModel();
        $filter = new Filter();
        foreach ($this->usergroupList as $usergroup) {
            $filter->orEqual($model->id, $usergroup->usergroupId);
        }

        //(new Debug())->write($filter);

        //$count = new UsergroupCount();
        //$count->filter = $filter;
        //if ($count->getCount() > 0) {


            $usergroupParameter = new UsergroupParameter();
            $usergroupId = $usergroupParameter->getValue();

            if (!$usergroupParameter->exists()) {

                $id = new UsergroupId();
                $id->filter->andFilter($filter);
                $id->addOrder($id->model->usergroup);
                $usergroupId = $id->getId();

            }


            $list = new BootstrapHyperlinkList($layout->col1);

            $reader = new UsergroupReader();
            $reader->filter->andFilter($filter);

            $reader->addOrder($reader->model->usergroup);
            foreach ($reader->getData() as $usergroupRow) {

                if ($usergroupRow->id == $usergroupId) {
                    $list->addActiveHyperlink($usergroupRow->usergroup);
                } else {

                    $site = new Site();
                    $site->title = $usergroupRow->usergroup;
                    $site->addParameter(new UsergroupParameter($usergroupRow->id));

                    $list->addSite($site);

                }

            }

        //(new Debug())->write($usergroupId);

            $form = new PermissionForm($layout->col2);
            $form->usergroupId = $usergroupId;
            $form->redirectSite = new Site();

            $table = new AdminTable($layout->col2);

            $header = new TableHeader($table);
            $header->addText('User');
            $header->addEmpty();

            $reader = new UserUsergroupReader();
            $reader->model->loadUser();
            $reader->filter->andEqual($reader->model->usergroupId, $usergroupId);
            $reader->addOrder($reader->model->user->login);

        //(new Debug())->write($usergroupId);

            foreach ($reader->getData() as $userUsergroupRow) {

                $row = new TableRow($table);

                $login = $userUsergroupRow->user->displayName;

                if (!$userUsergroupRow->user->active) {
                    $login .= ' (User inaktiv) User Id: '.$userUsergroupRow->userId;
                }

                $row->addText($login);

                $site = clone(UserUsergroupDeleteSite::$site);
                $site->addParameter(new UserUsergroupParameter($userUsergroupRow->id));
                $row->addIconSite($site);

            }

        //}

        return parent::getContent();

    }

}