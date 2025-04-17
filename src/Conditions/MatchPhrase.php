<?php

namespace Pkg6\Elasticsearch\Conditions;

class MatchPhrase extends ConditionAbstract
{
    protected string $method = "match_phrase";
}