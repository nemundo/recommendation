<?php

namespace Nemundo\Content\App\Video\Install;

use Nemundo\Content\App\Video\Content\IframeVideo\IframeVideoContentType;
use Nemundo\Content\App\Video\Content\Vimeo\VimeoContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\App\Video\Data\VideoModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;


class VideoUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ContentTypeSetup())
            ->removeContentType(new IframeVideoContentType())
            ->removeContentType(new VimeoContentType())
            ->removeContentType(new YouTubeContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new VideoModelCollection());

    }

}