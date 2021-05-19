<?php

namespace Nemundo\Content\App\WebCrawler\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\WebCrawler\Data\Domain\DomainReader;
use Nemundo\Content\App\WebCrawler\Data\Image\Image;
use Nemundo\Content\App\WebCrawler\Data\RssFeed\RssFeed;
use Nemundo\Content\App\WebCrawler\Data\Url\Url;
use Nemundo\Content\App\WebCrawler\Data\Url\UrlReader;
use Nemundo\Content\App\WebCrawler\Data\Url\UrlUpdate;
use Nemundo\Content\App\WebCrawler\Install\WebCrawlerInstall;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Text\ByteOrderMarkText;
use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Crawler\HtmlParser\HtmlParser;

class WebCrawlerScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->scriptName = 'webcrawler';
        $this->consoleScript = true;

    }

    public function run()
    {

        (new WebCrawlerInstall())->install();


        $domainReader = new DomainReader();
        foreach ($domainReader->getData() as $domainRow) {

            $data = new Url();
            $data->ignoreIfExists = true;
            $data->domainId = $domainRow->id;
            $data->url = $domainRow->url;
            $data->crawled = false;
            $data->deep=0;
            $data->save();

        }


        $urlReader = new UrlReader();
        $urlReader->filter->andEqual($urlReader->model->crawled, false);
        $urlReader->addOrder($urlReader->model->deep);
        foreach ($urlReader->getData() as $urlRow) {


            $response = (new CurlWebRequest())->getUrl($urlRow->url);


            $html = $response->html;
            $html = (new ByteOrderMarkText())->removeByteOrderMark($html);


            $update = new UrlUpdate();
            //$update->html = $html;
            $update->statusCode = $response->statusCode;
            $update->crawled = true;
            $update->updateById($urlRow->id);


            //(new Debug())->write($response->url);

            if ($response->statusCode = StatusCode::OK) {

                $parser = new HtmlParser();
                $parser->baseUrl = $response->url;
                $parser->fromHtml($response->html);


                $update = new UrlUpdate();
                //$update->html = $html;

                $update->crawled = true;
                $update->updateById($urlRow->id);


                foreach ($parser->getHyperlink() as $item) {

                    //(new Debug())->write($item);

                    if ($item->fullUrl !== null) {

                        $data = new Url();
                        $data->ignoreIfExists = true;
                        $data->domainId = $urlRow->domainId;
                        $data->url = $item->fullUrl;
                        $data->deep = substr_count($item->fullUrl, '/') - 2; // 2
                        $data->crawled = false;
                        $data->external = $item->external;
                        $data->save();

                    }

                    // external

                }


                foreach ($parser->getImage() as $imageItem) {
                    $data = new Image();
                    $data->ignoreIfExists = true;
                    $data->urlId = $urlRow->id;
                    $data->imageUrl = $imageItem;
                    $data->save();
                }



                foreach ($parser->getRssFeed() as $imageItem) {

                    $data = new RssFeed();
                    $data->ignoreIfExists = true;
                    $data->domainId = $urlRow->domainId;
                    $data->rssUrl = $imageItem;
                    $data->save();


                }





            }


        }


    }
}