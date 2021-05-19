<?php


namespace Nemundo\Srf\Reader\Show;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Srf\Config\BusinessUnit;
use Nemundo\Srf\Reader\Json\SrfJsonReader;


class TvShowJsonReader extends AbstractDataSource
{

    public $businessUnit = BusinessUnit::SRF;


    protected function loadData()
    {

        //$list = range('A', 'Z');
        //$list = range('a', 'z');
        //$list[] = '#';
        $list[] = 'M';

        //$list[] = '%230-9';

        foreach ($list as $character) {
            $this->loadCharacter($character);
        }


    }


    private function loadCharacter($character)
    {

        $url = new UrlBuilder('https://api.srgssr.ch/videometadata/v2/tv_shows/alphabetical');
        $url->addRequestValue('bu', $this->businessUnit);
        $url->addRequestValue('characterFilter', $character);
        $url->addRequestValue('pageSize', 'unlimited');

        $reader = new SrfJsonReader();
        $reader->url = $url->getUrl();



        $jsonList = $reader->getData();
        if (isset($jsonList[0]['showList'])) {

            foreach ($reader->getData()[0]['showList'] as $item) {

                $showItem = new ShowItem();
                $showItem->id = $item['id'];
                $showItem->show = $item['title'];
                $showItem->description = $item['description'];
                $showItem->imageUrl = $item['imageUrl'];

                $this->addItem($showItem);

            }

        }

    }


    /**
     * @return ShowItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}