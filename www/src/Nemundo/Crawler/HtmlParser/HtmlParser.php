<?php

namespace Nemundo\Crawler\HtmlParser;


use Nemundo\App\SystemLog\Message\SystemLogMessage;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\Validation\UrlValidation;
use Nemundo\Core\WebRequest\CurlWebRequest;


class HtmlParser extends AbstractBaseClass
{

    public $baseUrl = '';

    /**
     * @var bool
     */
    //private $loaded = false;

    /**
     * @var string
     */
    private $html = '';


    private $domain;


    public function fromUrl($url)
    {

        $request = new CurlWebRequest();
        $response = $request->getUrl($url);
        if ($response->statusCode == StatusCode::OK) {
            $this->html = $response->html;
        } else {
            (new SystemLogMessage())->logError('Url: ' . $url . ' Error: ' . $response->errorMessage);
        }

    }


    public function fromHtml($html)
    {
        $this->html = $html;
    }

    public function getHtml()
    {
        return $this->html;
    }


    // getTitle
    public function getPageTitle()
    {


        //$this->parse();
        // <title>Ausflugsziele &raquo; Verein Urner Wanderwege</title>

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<title.*?>(.*?)<';

        $pageTitle = '';  //'[no title]';
        if ($re->hasItems()) {
            $pageTitle = $re->getDataRow()->getValue(0);
        }

        return $pageTitle;

    }


    public function getDescription()
    {

        //$this->parse();

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<meta name="description" content="(.*?)"';
        //$re->regularExpression = '<meta name="description">(.*?)<';

        $description = '';
        if ($re->hasItems()) {
            $description = $re->getDataRow()->getValue(0);
        }

        return $description;


    }


    public function getRssFeed()
    {

        //$this->parse();

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<link rel="alternate".*?href="(.*?)".*?>';

        $feedList = [];
        foreach ($re->getData() as $item) {
            $feedList[] = $item->getValue(0);
        }

        return $feedList;

    }


    public function getImage()
    {

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<img.*?src="(.*?)".*?>';

        $imageList = [];
        foreach ($re->getData() as $item) {

            $imageUrl = $item->getValue(0);

            /*
            if (!(new UrlValidation())->isUrl($imageUrl)) {
                $imageUrl = $this->baseUrl . $imageUrl;
            }*/

            if ($imageUrl !== '') {
                $imageUrl = $this->getAbsoluteUrl($imageUrl);
                $imageList[] = $imageUrl;
            }


        }

        $imageList = array_unique($imageList);

        return $imageList;

    }


    public function getHyperlink()
    {


        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<a.*?href="(.*?)".*?>(.*?)</a>';

        /** @var HyperlinkItem[] $hyperlinkList */
        $hyperlinkList = [];

        foreach ($re->getData() as $item) {

            $url = $item->getValue(0);

            $position = strpos($url, '#');
            if ($position !== false) {
                $url = substr($url, 0, $position);
            }

            //$url =  substr($url, 0, strpos($url, '#'));


            if ($url !== '') {

                $hyperlinItem = new HyperlinkItem();
                $hyperlinItem->title = $item->getValue(1);
                $hyperlinItem->url = $url;  // $item->getValue(0);

                //if ($rel[0] == '/') $path = '';

                $hyperlinItem->fullUrl = $this->getAbsoluteUrl($url);


                if ((new UrlInformation($hyperlinItem->fullUrl))->getDomainWithScheme() !== $this->getDomain()) {
                    $hyperlinItem->external = true;
                }


                /*
                if (!(new UrlValidation())->isUrl($url)) {

                    if ($url[0] == '/') {
                        $hyperlinItem->fullUrl = $domain . $url;
                    } else {
                        $hyperlinItem->fullUrl = $this->baseUrl . $url;
                    }

                } else {

                    $hyperlinItem->fullUrl = $url;
                }*/

                $hyperlinkList[] = $hyperlinItem;

            }

        }

        //$hyperlinkList = array_unique($hyperlinkList);

        return $hyperlinkList;

    }


    /*
    private function parse()
    {

        if (!$this->loaded) {
            //$this->html = Http::get($this->url);
            //$this->loaded = true;
        }


    }*/


    private function getDomain()
    {

        if ($this->domain == null) {
            $this->domain = (new UrlInformation($this->baseUrl))->getDomainWithScheme();
        }

        return $this->domain;
    }


    private function getAbsoluteUrl($url)
    {

        //(new Debug())->write($url);

        $absouteUrl = null;

        if (!(new UrlValidation())->isUrl($url)) {

            if (isset($url[0])) {
                if ($url[0] == '/') {
                    $absouteUrl = $this->getDomain() . $url;
                } else {
                    $absouteUrl = $this->baseUrl . $url;
                }
            }

        } else {

            $absouteUrl = $url;
        }

        return $absouteUrl;

    }


}