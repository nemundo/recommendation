<?php


namespace Nemundo\Content\Form;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;

trait ContentFormTrait
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var bool
     */
    public $appendParameter = false;

    /**
     * @var bool
     */
    public $appendContentParameter = false;


    protected function loadCreateForm()
    {
    //    (new Debug())->write('Function loadUpdateForm not defined');
    }



    protected function loadUpdateForm()
    {
        (new Debug())->write('Function loadUpdateForm not defined');
    }

}