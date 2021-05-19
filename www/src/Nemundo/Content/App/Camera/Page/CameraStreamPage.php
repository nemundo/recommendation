<?php

namespace Nemundo\Content\App\Camera\Page;

use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\DeleteContentAction;
use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\Camera\CameraPaginationReader;
use Nemundo\Content\App\Camera\Parameter\CameraParameter;
use Nemundo\Content\App\Camera\Site\ImageDownloadSite;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Core\File\FileSize;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class CameraStreamPage extends AbstractTemplateDocument
{


    public function getContent()
    {


        $cameraReader = new CameraPaginationReader();
        $cameraReader->addOrder($cameraReader->model->id, SortOrder::DESCENDING);

        foreach ($cameraReader->getData() as $cameraRow) {

            $widget = new ContentWidget($this);
            $widget->contentType = (new CameraContentType($cameraRow->id));
            $widget->actionDropdown->addContentAction(new ViewContentAction());
            $widget->actionDropdown->addContentAction(new PublicShareAction());
            $widget->actionDropdown->addSeperator();
            //$widget->actionDropdown->addContentAction(new DeleteContentAction());


            $site = clone(ImageDownloadSite::$site);
            $site->addParameter(new CameraParameter($cameraRow->id));
            $widget->actionDropdown->addSite($site);




        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $cameraReader;


        return parent::getContent();
    }
}