<?php

namespace Pkg6\Elasticsearch\Conditions;

use JsonSerializable;

abstract class ConditionAbstract implements JsonSerializable
{
    protected string $method = "match_phrase";

    protected string $field;
    /**
     * @var array|int|string
     */
    protected $value;

    /**
     * @param string $field
     * @param string|int|array $value
     */
    public function __construct(string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            $this->method => [
                $this->field => $this->value
            ]
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}