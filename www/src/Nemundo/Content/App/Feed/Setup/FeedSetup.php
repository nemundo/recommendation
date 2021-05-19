<?php


namespace Nemundo\Content\App\Feed\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;

class FeedSetup extends AbstractBase
{

    public function addFeed($feedUrl)
    {


        $type = new FeedContentType();
        $type->feedUrl = $feedUrl;
        $type->saveType();


        return $this;

    }


    public function addCrawler() {



    }



}