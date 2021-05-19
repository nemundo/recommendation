<?php

namespace Nemundo\Admin\Usergroup\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\UserAdmin\Com\Permission\PermissionEditor;
use Nemundo\App\UserAdmin\Site\Delete\UserUsergroupDeleteSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\Web\Site\AbstractSite;

class UsergroupSite extends AbstractSite
{

    /**
     * @var UsergroupSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Usergroup';
        $this->url = 'usergroup';

        new UserUsergroupDeleteSite($this);

        UsergroupSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new SearchForm($layout->col1);

        $formRow = new BootstrapRow($form);

        /*
        $applicationParameter = new ApplicationParameter();

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->name = $applicationParameter->parameterName; // 'application';
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode=true;
        //$applicationListBox->value = $applicationListBox->getValue();*/


        $usergroupReader = new UsergroupReader();
        //if ($applicationListBox->hasValue()) {
        //if ($applicationParameter->hasValue()) {
            //$usergroupReader->filter->andEqual($usergroupReader->model->applicationId, $applicationListBox->getValue());
          //  $usergroupReader->filter->andEqual($usergroupReader->model->applicationId, $applicationParameter->getValue());

        /*} /*else {
            (new Debug())->write('NO VALUE');
        }*/

        $usergroupReader->addOrder($usergroupReader->model->usergroup);

        if ($usergroupReader->hasItems()) {

            $table = new AdminClickableTable($layout->col1);

            $tableHeader = new TableHeader($table);
            $tableHeader->addText('Benutzergruppe');


            $permission = new PermissionEditor($layout->col1);

            foreach ($usergroupReader->getData() as $usergroupRow) {
                //$permission->addUsergroup($usergroupRow->getUsergroupClassObject());
            }
        } else {
            $p = new Paragraph($layout->col1);
            $p->content = 'Keine Benutzergruppen vorhanden.';
        }

        $page->render();

    }

}