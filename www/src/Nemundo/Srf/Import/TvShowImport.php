<?php


namespace Nemundo\Srf\Import;


use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Crawler\WebCrawler\WebCrawler;
use Nemundo\Srf\Config\BusinessUnit;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Reader\Show\TvShowJsonReader;

class TvShowImport extends AbstractImport
{

    public function importData()
    {


        $crawler=new WebCrawler();
        $crawler->url= 'https://www.srf.ch/play/tv/sendungen';
        $crawler->regularExpression='';


        /*$webRequest=new CurlWebRequest();
        $webRequest->getUrl('https://www.srf.ch/play/tv/sendungen')


        /*
        $reader = new TvShowJsonReader();
        $reader->businessUnit = BusinessUnit::SRF;
        foreach ($reader->getData() as $item) {
            $type = new TvShowContentType();
            $type->show = $item->show;
            $type->srfId = $item->id;
            $type->saveType();
        }*/

    }

}