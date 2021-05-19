<?php

namespace Nemundo\Db\Filter;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Parameter\SqlStatement;
use Nemundo\Db\Sql\SqlConfig;


class FilterPart extends AbstractBase
{

    /**
     * @var AbstractField
     */
    public $type;

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var string
     */
    public $value;

    /**
     * @var FilterCompareType
     */
    public $compareType = FilterCompareType::EQUAL;

    /**
     * @var bool
     */
    public $includeParameter = true;

    /**
     * @var bool
     */
    public $includeLink = true;

    /**
     * @var FilterLink
     */
    public $filterLink = FilterLink::AND_LINK;


    public function getSqlParameter(SqlStatement $sqlParameterList)
    {

        $value = $this->value;
        if (is_bool($this->value)) {
            if ($this->value) {
                $value = 1;
            } else {
                $value = 0;
            }
        }

        $fieldName = $this->type->getConditionFieldName();

        $variableName = 'field_' . SqlConfig::$fieldCount;
        SqlConfig::$fieldCount++;

        if ($this->includeLink) {
            $sqlParameterList->sql = $sqlParameterList->sql . ' ' . $this->filterLink . ' ';
        }

        if ($this->includeParameter) {
            $sqlParameterList->sql = $sqlParameterList->sql . $fieldName . ' ' . $this->compareType . ' :' . $variableName;
            $sqlParameterList->addParameter($variableName, $value, $fieldName);
        } else {
            $sqlParameterList->sql = $sqlParameterList->sql . $fieldName . ' ' . $this->compareType;
        }

        return $sqlParameterList;

    }

}