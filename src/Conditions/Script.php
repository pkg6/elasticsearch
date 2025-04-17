<?php

namespace Pkg6\Elasticsearch\Conditions;

class Script extends ConditionAbstract
{
    protected string $method = 'script';
    protected array $script;

    public function __construct(array $script)
    {
        $this->script = $script;
        parent::__construct("", "");
    }

    public function toArray(): array
    {
        return [
            'script' => [
                "script" => $this->script
            ]
        ];
    }
}