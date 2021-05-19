<?php

namespace Nemundo\Content\View\Listing;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContentListing extends AbstractContentListing
{

    public function getContent()
    {

        $contentReader = new ContentPaginationReader();
        $contentReader->filter->andEqual($contentReader->model->contentTypeId, $this->contentType->typeId);
        $contentReader->addOrder($contentReader->model->subject);

        $contentReader->paginationLimit = 50;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Subject');
        $header->addEmpty();

        foreach ($contentReader->getData() as $contentRow) {

            $row = new AdminClickableTableRow($table);

            if ((new ContentParameter())->getValue() ==$contentRow->id) {
                $row->setActiveRow();
            }

            $row->addText($contentRow->subject);

            if ($this->redirectSite !== null) {
                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($contentRow->id));
                $row->addClickableSite($site);
            }

            $dropdown = new ContentActionDropdown($row);
            $dropdown->contentId = $contentRow->id;
            $dropdown->addDefaultAction();

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $contentReader;

        return parent::getContent();

    }

}