<?php

namespace Hackathon\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;

class RssFeedPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        (new FeedContentType())->getDefaultForm($this);



        (new FeedContentType())->getListing($this);


        /*
        new RssFeedForm($this);


        $table=new AdminTable($this);

        $reader=new RssFeedReader();
        foreach ($reader->getData() as $feedRow) {

            $row=new TableRow($table);
            $row->addText($feedRow->feedTitle);
            $row->addText($feedRow->rssUrl);


        }*/


        return parent::getContent();
    }
}