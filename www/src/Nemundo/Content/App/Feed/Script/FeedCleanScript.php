<?php


namespace Nemundo\Content\App\Feed\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;

class FeedCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'feed-clean';
    }


    public function run()
    {

        $reader = new FeedItemReader();
        foreach ($reader->getData() as $feedItemRow) {
            (new FeedItemContentType($feedItemRow->id))->deleteType();
        }

        $reader = new FeedReader();
        foreach ($reader->getData() as $feedItemRow) {
            (new FeedContentType($feedItemRow->id))->deleteType();
        }


    }

}