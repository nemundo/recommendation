<?php


namespace Nemundo\Srf\Reader\Episode;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Srf\Config\BusinessUnit;
use Nemundo\Srf\Reader\Json\SrfJsonReader;

abstract class AbstractEpisodeJsonReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $showId;

    public $businessUnit = BusinessUnit::SRF;

    protected $jsonUrl;

    protected function loadData()
    {

        if (is_null($this->showId)) {
            (new Debug())->write('No ShowId');
        }

        $urlBuilder = new UrlBuilder($this->jsonUrl . $this->showId);
        $urlBuilder->addRequestValue('bu', $this->businessUnit);


        $reader = new SrfJsonReader();
        $reader->url = $urlBuilder->getUrl();

        $jsonData = $reader->getData();

        if (isset($jsonData[0]['episodeList'])) {

            foreach ($jsonData[0]['episodeList'] as $episodeList) {

                if (isset($episodeList['mediaList'])) {

                    foreach ($episodeList['mediaList'] as $episode) {

                        $item = new EpisodeItem();
                        $item->id = $episode['id'];
                        $item->title = $episode['title'];

                        if (isset($episode['description'])) {
                            $item->description = $episode['description'];
                        }

                        $item->imageUrl = $episode['imageUrl'];
                        $item->urn = $episode['urn'];
                        $item->dateTime = new DateTime($episode['date']);
                        $item->length = $episode['duration'] / 1000;

                        if (isset($episode['podcastHdUrl'])) {
                            $item->podcastUrl = $episode['podcastHdUrl'];
                        }

                        $this->addItem($item);


                    }

                }

            }

        }

    }

    /**
     * @return EpisodeItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}