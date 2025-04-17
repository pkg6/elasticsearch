<?php

namespace Pkg6\Elasticsearch\Searcher;

use Pkg6\Elasticsearch\Contracts\IndexInterface;
use Pkg6\Elasticsearch\Contracts\QueryInterface;
use Pkg6\Elasticsearch\Contracts\SortInterface;

class SearcherAbstract
{
    protected IndexInterface $index;
    protected array $params;

    protected int $size = 20;

    protected ?QueryInterface $query = null;
    protected ?SortInterface $sort = null;

    public function __construct(IndexInterface $index)
    {
        $this->index = $index;
        $this->params["index"] = $index->getIndex();
        $this->params["type"] = $index->getType();
    }

    public function size(int $size)
    {
        $this->size = $size;
        return $this;
    }

    public function getParams()
    {
        $this->params['body']['size'] = $this->size;
        if (!empty($this->query)) {
            $this->params['body']['query'] = $this->query;
        }
        if (!empty($this->sort)) {
            $this->params['body']['sort'] = $this->sort;
        }
        return $this->params;
    }

    public function getResponse()
    {
        $this->getParams();
        return $this->index->getClient()->search($this->params);
    }
}