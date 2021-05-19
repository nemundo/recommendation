<?php

namespace Nemundo\Db\Sql\Field\Aggregate;


use Nemundo\Db\Reader\AbstractDataReader;

class SumField extends AbstractAggregateField
{

    public function __construct(AbstractDataReader $reader = null)
    {

        parent::__construct($reader);

        $this->aggregateFunction = 'SUM';
        $this->prefix = 'sum';

    }

}