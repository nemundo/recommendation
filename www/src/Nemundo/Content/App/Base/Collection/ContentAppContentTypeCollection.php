<?php


namespace Nemundo\Content\App\Base\Collection;


use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Contact\Content\Contact\ContactContentType;
use Nemundo\Content\App\Contact\Content\Phone\PhoneContentType;
use Nemundo\Content\App\File\Collection\FileContentTypeCollection;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;
use Nemundo\Content\App\Location\Content\Location\LocationContentType;
use Nemundo\Content\App\Map\Content\SwissMap\SwissMapContentType;
use Nemundo\Content\App\Note\Content\Note\NoteContentType;
use Nemundo\Content\App\Text\Content\Html\HtmlContentType;
use Nemundo\Content\App\Text\Content\LargeText\LargeTextContentType;
use Nemundo\Content\App\Text\Content\RichText\RichTextContentType;
use Nemundo\Content\App\Text\Content\SubTitle\SubTitleContentType;
use Nemundo\Content\App\Text\Content\Text\TextContentType;
use Nemundo\Content\App\Text\Content\Title\TitleContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;

class ContentAppContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        /*
        $this
            ->addContentType(new TextContentType())
            ->addContentType(new TitleContentType())
            ->addContentType(new SubTitleContentType())
            ->addContentType(new LargeTextContentType())
            ->addContentType(new HtmlContentType())
            ->addContentType(new RichTextContentType())
            ->addContentType(new ImageGalleryContentType())
            ->addContentType(new UrlContentType())
            ->addContentType(new SwissMapContentType())
            ->addContentType(new YouTubeContentType())
            ->addContentType(new WebcamContentType())
            ->addContentType(new ContactContentType())
            ->addContentType(new PhoneContentType())
            ->addContentType(new CameraContentType())
            ->addContentType(new LocationContentType())
            ->addContentType(new NoteContentType())
            ->addContentTypeCollection(new FileContentTypeCollection());*/


    }

}