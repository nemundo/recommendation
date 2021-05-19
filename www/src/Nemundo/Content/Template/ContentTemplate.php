<?php


namespace Nemundo\Content\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;

use Nemundo\Content\Com\Form\ApplicationContentTypeSearchForm;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\Admin\ContentListingSite;
use Nemundo\Content\Site\Admin\ContentAdminNewSite;
use Nemundo\Content\Site\Admin\AllContentRemoveSite;
use Nemundo\Content\Site\Admin\ContentTypeSite;
use Nemundo\Content\Site\Admin\DebugSite;
use Nemundo\Content\Site\ContentNewSite;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Site\Json\JsonExportSite;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


class ContentTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();


        $form = new SearchForm($this);   // new ApplicationContentTypeSearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ViewContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId = $applicationListBox->getValue();
        }









        /*
        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ViewContentTypeListBox($formRow);  // new ContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId=$applicationListBox->getValue();
        }*/


        $nav = new AdminNavigation($this);
        //$nav->site = ContentAdminSite::$site;

        $site = clone(ContentSite::$site);
        $site->addParameter(new ApplicationParameter());
        $site->addParameter(new ContentTypeParameter());
        $nav->addSite($site);


        $site = clone(ContentNewSite::$site);
        $site->addParameter(new ApplicationParameter());
        $site->addParameter(new ContentTypeParameter());
        $nav->addSite($site);




        /*new ContentNewSite($this);
        new ContentListingSite($this);
        new ContentTypeSite($this);
        new DebugSite($this);*/
     /*   new AllContentRemoveSite($this);
        new JsonExportSite($this);*/



    }

}