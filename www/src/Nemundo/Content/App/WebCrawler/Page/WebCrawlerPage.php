<?php

namespace Nemundo\Content\App\WebCrawler\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\App\WebCrawler\Data\Domain\DomainReader;
use Nemundo\Content\App\WebCrawler\Data\Image\ImagePaginationReader;
use Nemundo\Content\App\WebCrawler\Data\RssFeed\RssFeedReader;
use Nemundo\Content\App\WebCrawler\Data\Url\UrlPaginationReader;
use Nemundo\Content\App\WebCrawler\Data\Url\UrlReader;
use Nemundo\Content\App\WebCrawler\Parameter\DomainParameter;
use Nemundo\Content\App\WebCrawler\Template\WebCrawlerTemplate;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Web\Site\Site;

class WebCrawlerPage extends WebCrawlerTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 10;


        $list = new BootstrapSiteList($layout->col1);

        $reader = new DomainReader();
        foreach ($reader->getData() as $domainRow) {

            $site = new Site();
            $site->title = $domainRow->domain;
            $site->addParameter(new DomainParameter($domainRow->id));

            $list->addSite($site);

        }


        $domainParameter = new DomainParameter();
        if ($domainParameter->hasValue()) {

            $domainId = $domainParameter->getValue();

            $table = new AdminTable($layout->col2);

            $urlReader = new UrlReader();  //PaginationReader();
            $urlReader->filter->andEqual($urlReader->model->domainId, $domainId);
            $urlReader->filter->andEqual($urlReader->model->external,false);
            $urlReader->addOrder($urlReader->model->deep);

            $header = new AdminTableHeader($table);
            $header->addText($urlReader->model->title->label);
            $header->addText($urlReader->model->url->label);
            $header->addText($urlReader->model->external->label);
            $header->addText($urlReader->model->crawled->label);
            $header->addText($urlReader->model->deep->label);


            foreach ($urlReader->getData() as $urlRow) {

                $row = new AdminTableRow($table);
                $row->addText($urlRow->title);

                $link = new UrlHyperlink($row);
                $link->url = $urlRow->url;
                $link->content = $urlRow->url;
                $link->openNewWindow = true;

                //$row->addText($urlRow->url);
                $row->addYesNo($urlRow->external);
                $row->addYesNo($urlRow->crawled);
                $row->addText($urlRow->deep);


            }


            $table = new AdminTable($layout->col2);

            $urlReader = new ImagePaginationReader();
            $urlReader->model->loadUrl();
            $urlReader->filter->andEqual($urlReader->model->url->domainId, $domainId);

            $header = new AdminTableHeader($table);
            $header->addText($urlReader->model->imageUrl->label);
            /*$header->addText($urlReader->model->url->label);
            $header->addText($urlReader->model->crawled->label);*/

            foreach ($urlReader->getData() as $urlRow) {

                $row = new AdminTableRow($table);

                $link = new UrlHyperlink($row);
                $link->url = $urlRow->imageUrl;
                $link->content = $urlRow->imageUrl;
                $link->openNewWindow = true;

                //$row->addText($urlRow->url);
                //$row->addYesNo($urlRow->crawled);

            }




            $table = new AdminTable($layout->col2);

            $urlReader = new RssFeedReader();
            $urlReader->filter->andEqual($urlReader->model->domainId, $domainId);

            $header = new AdminTableHeader($table);
            $header->addText($urlReader->model->rssUrl->label);

            foreach ($urlReader->getData() as $urlRow) {

                $row = new AdminTableRow($table);

                $link = new UrlHyperlink($row);
                $link->url = $urlRow->rssUrl;
                $link->content = $urlRow->rssUrl;
                $link->openNewWindow = true;

            }



        }


        return parent::getContent();
    }
}