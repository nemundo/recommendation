<?php


namespace Nemundo\Db\Sql\Order;


use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Db\Sql\Field\AbstractField;

trait SqlOrderTrait
{

    /**
     * @var SqlOrder[]
     */
    private $orderList = [];


    public function addOrder(AbstractField $field, $sortOrder = SortOrder::ASCENDING)
    {

        $order = new SqlOrder();
        $order->field = $field;
        $order->sortOrder = $sortOrder;
        $this->orderList[] = $order;

        return $this;

    }


    private function getOrderSql()
    {

        $sql = '';

        if (sizeof($this->orderList) > 0) {
            $sqlOrder = new TextDirectory();
            foreach ($this->orderList as $orderBy) {
                $sqlOrder->addValue($orderBy->getSql());
            }
            $sql .= ' ORDER BY ' . $sqlOrder->getTextWithSeperator();
        }

        return $sql;

    }

}