<?php

namespace Nemundo\Content\App\Share\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Share\Data\PrivateShare\PrivateShareReader;
use Nemundo\Content\App\Share\Site\PrivateShareContentSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class SharePage extends AbstractTemplateDocument
{

    public function getContent()
    {



        $table = new AdminClickableTable($this);

        $reader = new PrivateShareReader();
        $reader->model->loadContent();
        $reader->model->loadUser();

        foreach ($reader->getData() as $privateShareRow) {


            $row = new AdminClickableTableRow($table);
            $row->addText($privateShareRow->content->subject);
            $row->addText($privateShareRow->user->login);

            $site = clone(PrivateShareContentSite::$site);
            $site->addParameter(new ContentParameter($privateShareRow->contentId));
            $row->addClickableSite($site);


        }







        return parent::getContent();
    }
}