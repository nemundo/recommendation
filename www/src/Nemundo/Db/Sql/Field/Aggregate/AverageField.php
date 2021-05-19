<?php

namespace Nemundo\Db\Sql\Field\Aggregate;

use Nemundo\Db\Reader\AbstractDataReader;

class AverageField extends AbstractAggregateField
{

    public function __construct(AbstractDataReader $reader = null)
    {

        parent::__construct($reader);

        $this->aggregateFunction = 'AVG';
        $this->prefix = 'avg';

    }

}