<?php

namespace Nemundo\Db\Filter;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Parameter\SqlStatement;

// AbstractDataFilter
abstract class AbstractFilter extends AbstractBaseClass
{

    /**
     * @var SqlStatement
     */
    private $sqlStatement;

    protected $filterCount = 0;

    abstract protected function loadFilter();

    public function __construct()
    {
        $this->sqlStatement = new SqlStatement();
        $this->loadFilter();
    }


    public function andFilter(AbstractFilter $filter)
    {

        if ($filter->isNotEmpty()) {
            $this->addFilter($filter, FilterLink::AND_LINK);
        }
        return $this;
    }


    public function orFilter(AbstractFilter $filter)
    {
        if ($filter->isNotEmpty()) {
            $this->addFilter($filter, FilterLink::OR_LINK);
        }
        return $this;
    }


    public function andEqual(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->filterLink = FilterLink::AND_LINK;
        $part->compareType = FilterCompareType::EQUAL;

        $this->addFilterPart($part);

        return $this;

    }


    public function orEqual(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->filterLink = FilterLink::OR_LINK;
        $part->compareType = FilterCompareType::EQUAL;

        $this->addFilterPart($part);

        return $this;

    }


    public function andContains(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = '%' . $value . '%';
        $part->compareType = FilterCompareType::LIKE;
        $this->addFilterPart($part);

        return $this;

    }


    public function orContains(AbstractField $type, $value)
    {

        $value = '%' . $value . '%';

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::LIKE;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;

    }


    public function andContainsLeft(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value . '%';
        $part->compareType = FilterCompareType::LIKE;
        $this->addFilterPart($part);

        return $this;
    }


    public function andContainsRight(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = '%' . $value;
        $part->compareType = FilterCompareType::LIKE;
        $this->addFilterPart($part);

        return $this;

    }


    public function andNotEqual(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::NOT_EQUAL;
        $this->addFilterPart($part);

        return $this;

    }


    public function orNotEqual(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::NOT_EQUAL;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;

    }


    public function andSmaller(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::SMALLER;
        $this->addFilterPart($part);

        return $this;
    }

    // andSmallerOrEqual
    public function andEqualOrSmaller(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::SMALLER_OR_EQUAL;
        $this->addFilterPart($part);

        return $this;
    }


    public function andGreater(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::GREATER;
        $this->addFilterPart($part);

        return $this;

    }


    public function andEqualOrGreater(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::GREATER_OR_EQUAL;
        $this->addFilterPart($part);

        return $this;

    }


    public function orEqualOrGreater(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::GREATER_OR_EQUAL;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;

    }


    public function orEqualOrSmaller(AbstractField $type, $value)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->value = $value;
        $part->compareType = FilterCompareType::SMALLER_OR_EQUAL;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;

    }


    public function andIsNull(AbstractField $type)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->includeParameter = false;
        $part->compareType = FilterCompareType::IS_NULL;
        $this->addFilterPart($part);

        return $this;
    }


    public function andIsNotNull(AbstractField $type)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->includeParameter = false;
        $part->compareType = FilterCompareType::IS_NOT_NULL;
        $this->addFilterPart($part);

        return $this;
    }


    public function orIsNull(AbstractField $type)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->includeParameter = false;
        $part->compareType = FilterCompareType::IS_NULL;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;
    }


    public function orIsNotNull(AbstractField $type)
    {

        $part = new FilterPart();
        $part->type = $type;
        $part->includeParameter = false;
        $part->compareType = FilterCompareType::IS_NOT_NULL;
        $part->filterLink = FilterLink::OR_LINK;
        $this->addFilterPart($part);

        return $this;
    }


    public function search($fieldName, $keyword)
    {

        /*$variableName = 'search';  // $this->getVariableName($fieldName);
        $this->sql = 'MATCH(' . $fieldName . ') AGAINST (:' . $variableName . ' IN BOOLEAN MODE)';
        $this->parameter[$variableName] = $keyword;*/


        return $this;
    }


    public function getSqlStatement()
    {

        return $this->sqlStatement;

    }


    public function isEmpty()
    {

        $value = false;
        if ($this->filterCount == 0) {
            $value = true;
        }
        return $value;


    }


    public function isNotEmpty()
    {

        $value = true;
        if ($this->filterCount == 0) {
            $value = false;
        }
        return $value;


    }


    private function addFilterPart(FilterPart $filterPart)
    {

        if ($this->filterCount == 0) {
            $filterPart->includeLink = false;
        }

        $filterPart->getSqlParameter($this->sqlStatement);

        $this->filterCount++;

    }


    private function addFilter(AbstractFilter $filter, $filterLink)
    {

        if ($this->filterCount > 0) {
            $this->sqlStatement->sql .= ' ' . $filterLink . ' ';
        }

        $this->sqlStatement->sql .= '(';

        $filterSqlParameterList = $filter->getSqlStatement();

        $this->sqlStatement->sql .= $filterSqlParameterList->sql;
        $this->sqlStatement->addParameterList($filterSqlParameterList->getParameterList());

        $this->sqlStatement->sql .= ')';

        $this->filterCount++;

    }


}