<?php

namespace Nemundo\Content\Page\Admin;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class DebugPage extends ContentAdminTemplate
{
    public function getContent()
    {

        $widget = new AdminWidget($this);
        $widget->widgetTitle = 'Unregistred Content Type';

        $contentTypeReader = new ContentTypeReader();
        $contentTypeReader->model->loadApplication();

        $contentTypeReader->addOrder($contentTypeReader->model->contentType);

        $table = new AdminClickableTable($widget);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');
        $header->addText($contentTypeReader->model->application->label);
        $header->addEmpty();

        foreach ($contentTypeReader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            if ($contentType == null) {

                $row = new BootstrapClickableTableRow($table);

                $row->addText($contentTypeRow->contentType);
                $row->addText($contentTypeRow->phpClass);
                $row->addText($contentTypeRow->id);

                $row->addText($contentTypeRow->application->application);

                /*
                $site = clone(ContentTypeSite::$site);
                $site->addParameter(new ApplicationParameter());
                $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
                $row->addClickableSite($site);*/

            }

        }


        return parent::getContent();
    }
}