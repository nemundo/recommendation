<?php


namespace Nemundo\Content\Builder;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Core\Base\AbstractBase;

class ContentBuilder extends AbstractBase
{

    public function getContent($contentId) {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $contentRow = $reader->getRowById($contentId);
        $contentType = $contentRow->getContentType();

        /*
        if ($checkContentType) {
            $this->checkContentType($contentType);
        }*/

        return $contentType;

    }

}