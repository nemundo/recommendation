<?php

namespace Nemundo\Com\Package;


use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Web\WebConfig;

trait PackageTrait
{

    public function addPackage(AbstractPackage $package)
    {

        foreach ($package->getJs() as $jsFilename) {
            LibraryHeader::addJsUrl(WebConfig::$webUrl . 'asset/' . $jsFilename);
        }

        foreach ($package->getCss() as $css) {
            LibraryHeader::addCssUrl(WebConfig::$webUrl . 'asset/' . $css);
        }

    }

}