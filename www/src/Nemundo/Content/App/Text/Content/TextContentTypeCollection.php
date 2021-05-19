<?php


namespace Nemundo\Content\App\Text\Content;


use Nemundo\Content\App\Text\Content\Html\HtmlContentType;
use Nemundo\Content\App\Text\Content\LargeText\LargeTextContentType;
use Nemundo\Content\App\Text\Content\RichText\RichTextContentType;
use Nemundo\Content\App\Text\Content\Text\TextContentType;
use Nemundo\Content\App\Text\Content\Title\TitleContentType;
use Nemundo\Content\App\Text\Content\VersionLargeText\VersionLargeTextContentType;
use Nemundo\Content\App\Text\Content\VersionText\VersionTextContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;

class TextContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this
            ->addContentType(new TextContentType())
            //->addContentType(new TitleContentType())
            ->addContentType(new LargeTextContentType())
            ->addContentType(new HtmlContentType())
            ->addContentType(new RichTextContentType());

            //->addContentType(new VersionTextContentType())
            //->addContentType(new VersionLargeTextContentType());


    }

}