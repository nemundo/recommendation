<?php


namespace Nemundo\Srf\Reader\Livestream;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Srf\Config\BusinessUnit;
use Nemundo\Srf\Reader\Json\SrfJsonReader;

abstract class AbstractLivestreamJsonReader extends AbstractDataSource
{

    //public $businessUnit = BusinessUnit::SRF;

    /**
     * @var string
     */
    protected $jsonUrl;

    protected function loadData()
    {


        foreach ((new BusinessUnit())->getList() as $businessUnit) {

            $url = new UrlBuilder($this->jsonUrl);
            $url->addRequestValue('bu', $businessUnit);

            $reader = new SrfJsonReader();
            $reader->url = $url->getUrl();

            foreach ($reader->getData()[0]['mediaList'] as $show) {

                $item = new LivestreamItem();
                $item->livestream = $show['title'];
                $item->urn = $show['urn'];
                $item->logo = $show['imageUrl'];
                $item->businessUnit = $businessUnit;
                $this->addItem($item);


            }

        }

    }


    /**
     * @return LivestreamItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}