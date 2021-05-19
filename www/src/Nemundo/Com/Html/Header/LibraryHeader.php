<?php

namespace Nemundo\Com\Html\Header;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Header\AbstractHeaderHtmlContainer;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Html\Header\Style;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Script\JavaScript;


class LibraryHeader extends AbstractHeaderHtmlContainer
{

    public static $documentTitle;

    public static $documentDescription;

    //public static $documentImage;


    private static $jsUrlList = [];

    private static $cssUrlList = [];

    private static $jsList = [];

    private static $styleList = [];

    /**
     * @var AbstractHtmlContainer[]
     */
    private static $headerContainerList = [];

    public static function addCssUrl($url)
    {

        LibraryHeader::$cssUrlList[] = $url;

    }


    public static function addJsUrl($url)
    {

        LibraryHeader::$jsUrlList[] = $url;

    }


    public static function addStyle($style)
    {

        LibraryHeader::$styleList[] = $style;

    }

    public static function addJavaScript($code)
    {

        LibraryHeader::$jsList[] = $code;

    }


    public static function addHeaderContainer(AbstractHtmlContainer $container)
    {

        LibraryHeader::$headerContainerList[] = $container;

    }


    public function getContent()
    {


        $title = new Title($this);
        $title->content = LibraryHeader::$documentTitle;

        LibraryHeader::$jsUrlList = array_unique(LibraryHeader::$jsUrlList);
        foreach (LibraryHeader::$jsUrlList as $filename) {
            $js = new JavaScript();
            $js->src = $filename;
            $this->addContainer($js);
        }

        LibraryHeader::$cssUrlList = array_unique(LibraryHeader::$cssUrlList);
        foreach (LibraryHeader::$cssUrlList as $filename) {
            $css = new StylesheetLink($this);
            $css->href = $filename;
        }

        if (count(LibraryHeader::$styleList) > 0) {
            $style = new Style($this);
            foreach (LibraryHeader::$styleList as $value) {
                $style->addStyle($value);
            }
        }

        if (count(LibraryHeader::$jsList) > 0) {
            $script = new JavaScript($this);
            foreach (LibraryHeader::$jsList as $value) {
                $script->addCodeLine($value);
            }
        }

        foreach (LibraryHeader::$headerContainerList as $container) {
            $this->addContainer($container);
        }

        return parent::getContent();

    }

}