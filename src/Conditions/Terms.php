<?php

namespace Pkg6\Elasticsearch\Conditions;

class Terms extends ConditionAbstract
{
    protected string $method = "terms";

    public function __construct(string $field, array $value)
    {
        parent::__construct($field, $value);
    }
}