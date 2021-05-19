<?php


namespace Nemundo\Content\App\Favorite\Install;


use Nemundo\Content\App\Favorite\Content\FavoriteContentType;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Project\Install\AbstractClean;

class FavoriteClean extends AbstractClean
{

    public function cleanData()
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId,(new FavoriteContentType())->typeId);
        foreach ($reader->getData() as $contentRow ) {

            $type=new FavoriteContentType($contentRow->id);
            $type->deleteType();

        }


    }

}