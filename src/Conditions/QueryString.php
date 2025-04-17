<?php

namespace Pkg6\Elasticsearch\Conditions;

class QueryString extends ConditionAbstract
{
    protected string $query;
    protected array $fields;

    public function __construct(string $query, array $fields = [])
    {
        $this->query = $query;
        $this->fields = $fields;
        parent::__construct("", "");
    }

    public function toArray(): array
    {
        $condition = ['query_string' => ['query' => $this->query]];
        if (!empty($this->fields)) {
            $condition['query_string']['fields'] = $this->fields;
        }
        return $condition;
    }
}