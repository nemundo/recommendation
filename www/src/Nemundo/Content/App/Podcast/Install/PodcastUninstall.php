<?php

namespace Nemundo\Content\App\Podcast\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentType;
use Nemundo\Content\App\Podcast\Data\PodcastModelCollection;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Model\Setup\ModelCollectionSetup;

class PodcastUninstall extends AbstractUninstall
{
    public function uninstall()
    {
        (new ModelCollectionSetup())->removeCollection(new PodcastModelCollection());




        (new ContentIndexBuilder(new PodcastContentType()))
            ->removeAllIndex();

        (new ContentIndexBuilder(new EpisodeContentType()))
            ->removeAllIndex();






    }
}