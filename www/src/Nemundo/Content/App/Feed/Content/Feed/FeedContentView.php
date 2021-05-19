<?php


namespace Nemundo\Content\App\Feed\Content\Feed;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FeedContentView extends AbstractContentView
{

    /**
     * @var FeedContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='b0fb9127-741e-4d86-b53f-88ea03dda862';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $feedRow = $this->contentType->getDataRow();

        $title = new AdminSubtitle($this);
        $title->content = $feedRow->title;

        $p = new Paragraph($this);
        $p->content = $feedRow->description;


        $table = new AdminClickableTable($this);

        $reader = new FeedItemReader();
        $reader->filter->andEqual($reader->model->feedId, $this->contentType->getDataId());
        $reader->addOrder($reader->model->dateTime, SortOrder::DESCENDING);
        $reader->limit = 10;
        foreach ($reader->getData() as $itemRow) {

            // open new tab

            $row = new BootstrapClickableTableRow($table);

            if ($itemRow->hasImage) {
                $img = new BootstrapResponsiveImage($row);
                $img->src = $itemRow->imageUrl;
            } else {
                $row->addEmpty();
            }

            $row->addText($itemRow->dateTime->getShortDateTimeLeadingZeroFormat(), true);
            $row->addText($itemRow->title);
            $row->addText($itemRow->description);

            if ($itemRow->hasAudio) {
                $img = new BootstrapResponsiveImage($row);
                $img->src = $itemRow->imageUrl;

                $contentType = new FeedItemContentType($itemRow->id);

                $site = clone(ExplorerSite::$site);
                $site->addParameter(new ContentParameter($contentType->getContentId()));
                $row->addClickableSite($site);

            } else {

                $row->addClickableUrl($itemRow->url);

            }

        }

        return parent::getContent();

    }

}