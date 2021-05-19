<?php


namespace Nemundo\Srf\Content\Base;

use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Index\News\NewsIndexTrait;
use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Srf\Data\Episode\Episode;
use Nemundo\Srf\Data\Episode\EpisodeCount;
use Nemundo\Srf\Data\Episode\EpisodeDelete;
use Nemundo\Srf\Data\Episode\EpisodeId;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Data\Episode\EpisodeRow;
use Nemundo\Srf\MediaType\AbstractMediaType;
use Nemundo\Srf\Parameter\EpisodeParameter;
use Nemundo\Srf\Site\SrfEpisodeSite;

abstract class AbstractEpisodeContentType extends AbstractContentType
{

    use DateTimeIndexTrait;
    use SearchIndexTrait;
    use NewsIndexTrait;

    public $showId;

    public $title;

    public $description;

    public $urn;

    public $length;

    public $episodeDateTime;

    /**
     * @var AbstractMediaType
     */
    protected $mediaType;


    protected function loadContentType()
    {

        $this->viewClassList[] = EpisodeContentView::class;
        $this->listingClass = EpisodeContentListing::class;
        $this->viewSite = SrfEpisodeSite::$site;
        $this->parameterClass = EpisodeParameter::class;

    }


    protected function onCreate()
    {

        $data = new Episode();
        $data->showId = $this->showId;
        $data->title = $this->title;
        $data->description = $this->description;
        $data->urn = $this->urn;
        $data->length = $this->length;
        $data->dateTime = $this->episodeDateTime;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

    }


    protected function onIndex()
    {

        /*
        $episodeRow = $this->getDataRow();
        $this->addSearchText($episodeRow->title);
        $this->addSearchText($episodeRow->description);*/


    }


    protected function onDelete()
    {
        parent::onDelete();
        (new EpisodeDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {

        $episodeReader = new EpisodeReader();
        $episodeReader->model->loadShow();
        $this->dataRow = $episodeReader->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|EpisodeRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getTypeLabel()
    {
        return $this->getDataRow()->show->show;
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }

    public function getText()
    {
        return $this->getDataRow()->description;
    }


    public function getDateTime()
    {
        return $this->getDataRow()->dateTime;
    }


    public function existItem()
    {


        //if (!parent::existItem()) {

        $value = parent::existItem();  // false;

        if (!$value) {
            $count = new EpisodeCount();
            $count->filter->andEqual($count->model->urn, $this->urn);
            if ($count->getCount() > 0) {
                $value = true;

                $id = new EpisodeId();
                $id->filter->andEqual($count->model->urn, $this->urn);
                $this->dataId = $id->getId();

            }
        }

        return $value;


    }


    public function getUniqueId()
    {
        return $this->getDataRow()->urn;
    }

    public function getTitle()
    {
        return $this->getDataRow()->title;
    }

    public function getLead()
    {
        return $this->getDataRow()->description;
    }

    public function getUrl()
    {

        $url = 'https://www.srf.ch/play/embed?urn=' . $this->getDataRow()->urn;
        return $url;

    }


}