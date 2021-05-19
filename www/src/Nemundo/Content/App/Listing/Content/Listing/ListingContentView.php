<?php

namespace Nemundo\Content\App\Listing\Content\Listing;

use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\Listing\Data\Listing\ListingReader;
use Nemundo\Content\App\Listing\Data\ListingValue\ListingValueReader;
use Nemundo\Content\View\AbstractContentView;

class ListingContentView extends AbstractContentView
{
    /**
     * @var ListingContentType
     */
    public $contentType;


    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $ul=new UnorderedList($this);

        $reader=new ListingValueReader();
        foreach ($reader->getData() as $listingRow) {
            $ul->addText($listingRow->value);
        }


        return parent::getContent();
    }
}