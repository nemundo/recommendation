<?php


namespace Nemundo\Srf\Content\Livestream;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamReader;


class SrfLivestreamContentListing extends AbstractContentListing
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Livestream');

        $reader = new RadioLivestreamReader();
        $reader->addOrder($reader->model->livestream);
        foreach ($reader->getData() as $livestreamRow) {
            $row = new BootstrapClickableTableRow($table);
            $row->addText($livestreamRow->livestream);

            $type = new SrfLivestreamContentType($livestreamRow->id);
            $row->addClickableSite($this->getContentRedirectSite($type->getContentId()));  //RedirectSite($livestreamRow->id));

        }

        return parent::getContent();

    }

}