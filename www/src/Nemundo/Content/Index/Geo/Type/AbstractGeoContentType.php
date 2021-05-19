<?php


namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Content\Type\AbstractContentType;


abstract class AbstractGeoContentType extends AbstractContentType
{

    use GeoIndexTrait;
}