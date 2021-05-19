<?php


namespace Nemundo\Content\App\Bookmark\Content;


use Nemundo\Content\App\Bookmark\Data\Bookmark\Bookmark;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkReader;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkRow;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Crawler\HtmlParser\HtmlParser;
use Nemundo\Crawler\HtmlParser\OpenGraphParser;
use Nemundo\Model\Data\Property\File\FileProperty;

class UrlContentType extends AbstractSearchContentType
{

    public $url;

    public $title;

    public $description;

    /**
     * @var FileProperty
     */
    public $image;

    protected function loadContentType()
    {

        $this->typeLabel = 'Url';
        $this->typeId = '0abbd11d-5321-4eef-a984-0e4061c5738d';

        $this->formClassList[] = UrlContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = UrlContentView::class;
        $this->formPartClass = UrlContentFormPart::class;

        $this->image = new FileProperty();

    }


    protected function onCreate()
    {

        $title = $this->title;
        if ($title === '') {
            $title = $this->url;
        }

        $data = new Bookmark();
        $data->url = $this->url;
        $data->title = $title;
        $data->description = $this->description;
        $data->image->fromFileProperty($this->image);
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new BookmarkUpdate();
        $update->title = $this->title;
        $update->description = $this->description;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->title);
        $this->addSearchText($this->getDataRow()->description);

    }


    protected function onDataRow()
    {

        $this->dataRow = (new BookmarkReader())->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|BookmarkRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


    public function fromUrl($url)
    {

        $this->url = $url;
        $this->title = $url;

        $ogParser = new OpenGraphParser($url);
        $this->title = $ogParser->title;
        $this->description = $ogParser->description;

        if ($ogParser->hasImage) {
            $this->image->fromUrl($ogParser->imageUrl);
        }

        if ($this->title == '') {

            $htmlParser = new HtmlParser();
            $htmlParser->fromUrl($url);
            $this->title = $htmlParser->getPageTitle();

            if ($this->description == '') {
                $this->description = $htmlParser->getDescription();
            }

        }

        return $this;

    }

}