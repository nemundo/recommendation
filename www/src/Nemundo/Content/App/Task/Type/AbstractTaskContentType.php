<?php


namespace Nemundo\Content\App\Task\Type;


use Nemundo\Content\App\Task\Index\TaskIndexTrait;
use Nemundo\Content\Type\AbstractContentType;


abstract class AbstractTaskContentType extends AbstractContentType
{

    use TaskIndexTrait;

}