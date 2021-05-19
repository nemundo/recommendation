<?php


namespace Nemundo\Content\App\Feed\WebCrawler;


use Nemundo\Content\App\Feed\Data\WebCrawler\WebCrawler;
use Nemundo\Content\App\Feed\Data\WebCrawler\WebCrawlerDelete;
use Nemundo\Core\Base\AbstractBase;

class FeedWebCrawlerSetup extends AbstractBase
{

    public function addWebCrawler(AbstractFeedWebCrawler $webCrawler)
    {

        $data = new WebCrawler();
        $data->updateOnDuplicate = true;
        $data->phpClass = $webCrawler->getClassName();
        $data->setupStatus = true;
        $data->save();

        return $this;

    }


    public function removeWebCrawler(AbstractFeedWebCrawler $webCrawler)
    {

        $delete = new WebCrawlerDelete();
        $delete->filter->andEqual($delete->model->phpClass, $webCrawler->getClassName());
        $delete->delete();

        return $this;

    }


}