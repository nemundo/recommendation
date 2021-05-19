<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Com\Video\YouTube\YouTubeInformation;
use Nemundo\Content\App\Video\Data\YouTube\YouTube;
use Nemundo\Content\App\Video\Data\YouTube\YouTubeDelete;
use Nemundo\Content\App\Video\Data\YouTube\YouTubeReader;
use Nemundo\Content\App\Video\Data\YouTube\YouTubeRow;
use Nemundo\Content\App\Video\Data\YouTube\YouTubeUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\Listing\ContentListing;


class YouTubeContentType extends AbstractContentType
{

    public $youTubeUrl;

    public $title;

    public $description;


    protected function loadContentType()
    {
        $this->typeId = '5badc331-f0d1-4f14-8eba-e8468a64b9e3';
        $this->typeLabel = 'YouTube';
        $this->formClassList[] = YouTubeContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = YouTubeContentView::class;
        $this->viewClassList[] = YouTubeTitleDescriptionContentView::class;
        $this->formPartClass = YouTubeContentFormPart::class;
        // Image mit Play View

        $this->listingClass = ContentListing::class;

    }


    protected function onCreate()
    {

        $data = new YouTube();
        $data->youtubeId = (new YouTubeInformation())->getYouTubeIdFromUrl($this->youTubeUrl);
        $data->title = $this->title;
        $data->description = $this->description;
        $this->dataId = $data->save();


        // http://gdata.youtube.com/feeds/api/videos/CeQZDMuZIS8


    }


    protected function onUpdate()
    {

        $update = new YouTubeUpdate();
        $update->youtubeId = (new YouTubeInformation())->getYouTubeIdFromUrl($this->youTubeUrl);

        //$update->title = $this->title;
        //$update->description = $this->description;
        $this->dataId = $update->updateById($this->dataId);

    }


    protected function onDelete()
    {
        (new YouTubeDelete())->deleteById($this->dataId);
    }


    /*
    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->title);
        $this->addSearchText($this->getDataRow()->description);

    }*/


    protected function onDataRow()
    {
        $this->dataRow = (new YouTubeReader())->getRowById($this->getDataId());
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|YouTubeRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


}