<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder\Model;

use QuillStack\QueryBuilder\QueryBuilder;
use QuillStack\QueryBuilder\QueryBuilderInterface;

class Model implements QueryBuilderInterface, ModelInterface
{
    /**
     * @var QueryBuilder
     */
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder();
        $this->queryBuilder->setModel($this);
    }

    /**
     * {@inheritDoc}
     */
    public function select($columns = '*'): QueryBuilderInterface
    {
        return $this->queryBuilder->select($columns);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuery(): string
    {
        return $this->queryBuilder->getQuery();
    }

    /**
     * {@inheritDoc}
     */
    public function get(): array
    {
        return $this->queryBuilder->get();
    }
}
