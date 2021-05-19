<?php

namespace Nemundo\Content\Index\Tree\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Index\Tree\Site\Admin\TreeAdminSite;
use Nemundo\Content\Index\Tree\Site\TreeContentNewSite;
use Nemundo\Content\Index\Tree\Site\TreeSite;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\ContentNewSite;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


class TreeTemplate extends AbstractTemplateDocument
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


        /*$nav = new AdminNavigation($this);
        $nav->site = TreeSite::$site;*/



        $nav = new AdminNavigation($this);
        //$nav->site = ContentAdminSite::$site;

        $site = clone(TreeSite::$site);
        $site->addParameter(new ApplicationParameter());
        $site->addParameter(new ContentTypeParameter());
        $nav->addSite($site);


        $site = clone(TreeContentNewSite::$site);
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