<?php


namespace Nemundo\Content\App\File\Content;


use Nemundo\Content\App\File\Content\Audio\AudioContentType;

use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\File\Content\Video\VideoContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;

class FileContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this
            ->addContentType(new FileContentType())
            ->addContentType(new AudioContentType())
            ->addContentType(new VideoContentType())
            ->addContentType(new ImageContentType());




    }

}