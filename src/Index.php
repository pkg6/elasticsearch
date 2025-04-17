<?php

namespace Pkg6\Elasticsearch;

use Pkg6\Elasticsearch\Abstracts\IndexAbstract;

class Index extends IndexAbstract
{
    public function __construct($index, $type = "doc")
    {
        $this->index = $index;
        $this->type = $type;
    }
}