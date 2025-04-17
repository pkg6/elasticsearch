<?php

namespace Pkg6\Elasticsearch\Conditions;

use Pkg6\Elasticsearch\Conditions\Ranges\Values;

class Range extends ConditionAbstract
{
    protected string $method = "range";
    protected ?Values $value1;
    protected ?Values $value2;

    public function __construct(string $field, Values $value1 = null, Values $value2 = null)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        parent::__construct($field, "");
    }

    public function toArray(): array
    {
        $range = [
            'range' => [
                $this->field => []
            ]
        ];
        if (is_null($this->value1) && !empty($this->value1->getCondition())) {
            $range['range'][$this->field][$this->value1->getCondition()] = $this->value1->getValue();
        }
        if (is_null($this->value2) && !empty($this->value2->getCondition())) {
            $range['range'][$this->field][$this->value2->getCondition()] = $this->value2->getValue();
        }
        return [$range];
    }
}