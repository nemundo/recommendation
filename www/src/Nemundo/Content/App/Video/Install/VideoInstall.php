<?php

namespace Nemundo\Content\App\Video\Install;

use Nemundo\Content\App\Video\Application\VideoApplication;
use Nemundo\Content\App\Video\Content\IframeVideo\IframeVideoContentType;
use Nemundo\Content\App\Video\Content\Vimeo\VimeoContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\App\Video\Data\VideoModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;


class VideoInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new VideoModelCollection());

        (new ContentTypeSetup(new VideoApplication()))
            ->addContentType(new IframeVideoContentType())
            ->addContentType(new VimeoContentType())
            ->addContentType(new YouTubeContentType());

    }
}