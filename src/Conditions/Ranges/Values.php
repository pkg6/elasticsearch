<?php

namespace Pkg6\Elasticsearch\Conditions\Ranges;

use InvalidArgumentException;

class Values
{
    /**
     * @var string
     */
    protected $condition;
    /**
     * @var string|int|float
     */
    protected $value;

    protected $conditions = [
        ">" => "gt",
        "gt" => "gt",
        ">=" => "gte",
        "gte" => "gte",
        "<" => "lt",
        "lt" => "lt",
        "<=" => "lte",
        "lte" => "lte",
    ];

    public function __construct(string $condition, $value)
    {
        if (!isset($this->conditions[$condition])) {
            throw new InvalidArgumentException("Range ConditionAbstract '$condition' does not exist");
        }
        $this->condition = $this->conditions[$condition];
        $this->value = $value;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @return float|int|string
     */
    public function getValue()
    {
        return $this->value;
    }
}