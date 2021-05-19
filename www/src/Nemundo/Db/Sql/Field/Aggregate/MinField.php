<?php

namespace Nemundo\Db\Sql\Field\Aggregate;


use Nemundo\Db\Reader\AbstractDataReader;

class MinField extends AbstractAggregateField
{

    public function __construct(AbstractDataReader $reader = null)
    {

        parent::__construct($reader);

        $this->aggregateFunction = 'MIN';
        $this->prefix = 'min';

    }

}