<?php

namespace Pkg6\Elasticsearch;

use JsonSerializable;
use Pkg6\Elasticsearch\Conditions\Exists;
use Pkg6\Elasticsearch\Conditions\MatchPhrase;
use Pkg6\Elasticsearch\Conditions\QueryString;
use Pkg6\Elasticsearch\Conditions\Range;
use Pkg6\Elasticsearch\Conditions\Ranges\Values;
use Pkg6\Elasticsearch\Conditions\Script;
use Pkg6\Elasticsearch\Conditions\Terms;

class Query implements JsonSerializable
{
    protected array $query = [
        'bool' => [
            'must' => [],
            'must_not' => []
        ]
    ];

    public function where(array $values)
    {
        foreach ($values as $field => $value) {
            if (is_array($value)) {
                $this->whereIn($field, $value);
            } else {
                $this->whereMatchPhrase($field, $value);
            }
        }
        return $this;
    }

    public function whereMatchPhrase(string $field, string $value)
    {
        $this->query['bool']['must'][] = new MatchPhrase($field, $value);
        return $this;
    }

    public function whereNotMatchPhrase(string $field, string $value)
    {
        $this->query['bool']['must_not'][] = new MatchPhrase($field, $value);
        return $this;
    }

    public function whereIn(string $field, array $value)
    {
        $this->query['bool']['must'][] = new Terms($field, $value);
        return $this;
    }

    public function whereNotIn(string $field, array $value)
    {
        $this->query['bool']['must_not'][] = new Terms($field, $value);;
        return $this;
    }


    public function whereRange(string $field, $gte, $lte)
    {
        $this->query['bool']['must'][] = new Range(
            $field,
            new Values("gte", $gte),
            new Values("lte", $lte)
        );
        return $this;
    }

    public function whereNotRange(string $field, $gte, $lte)
    {
        $this->query['bool']['must_not'][] = new Range(
            $field,
            new Values("gte", $gte),
            new Values("lte", $lte)
        );
        return $this;
    }

    public function whereExists(string $field)
    {
        $this->query['bool']['must'][] = new Exists($field);;
        return $this;
    }

    public function whereNotExists(string $field)
    {
        $this->query['bool']['must_not'][] = new Exists($field);
        return $this;
    }

    public function whereQueryString($query, $fields = [])
    {
        $this->query['bool']['must'][] = new QueryString($query, $fields);
        return $this;
    }

    public function whereNotQueryString($query, $fields = [])
    {
        $this->query['bool']['must_not'][] = new QueryString($query, $fields);;
        return $this;
    }

    public function whereScript(array $script)
    {
        $this->query['bool']['must'][] = new Script($script);
        return $this;
    }

    public function whereNotScript(array $script)
    {
        $this->query['bool']['must_not'][] = new Script($script);
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->query;
    }
}