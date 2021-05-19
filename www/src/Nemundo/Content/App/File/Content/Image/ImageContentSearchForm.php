<?php


namespace Nemundo\Content\App\File\Content\Image;


use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\File\Data\ImageIndex\ImageIndexReader;
use Nemundo\Content\Builder\ContentBuilder;

use Nemundo\Content\Index\Tree\Com\Form\AbstractContentSearchForm;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageContentSearchForm extends AbstractContentSearchForm
{

    protected $requestName = 'image_id';

    public function getContent()
    {

        $ul = new UnorderedList($this);

        $reader = new ImageIndexReader();
        foreach ($reader->getData() as $indexRow) {

            $btn = new SubmitButton($ul);
            $btn->name = $this->requestName;
            $btn->label = '';
            $btn->value = $indexRow->contentId;

            $img = new BootstrapResponsiveImage($btn);
            $img->src = $indexRow->image->getImageUrl($reader->model->imageAutoSize200);

        }

        $this->submitButton->visible = false;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $value = (new PostRequest($this->requestName))->getValue();

        $contentType = (new ContentBuilder())->getContent($value);
        $this->saveTree($contentType);

    }

}