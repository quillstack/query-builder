<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder\Model;

use PDO;
use QuillStack\QueryBuilder\QueryBuilder;
use QuillStack\QueryBuilder\QueryBuilderInterface;

class Model implements QueryBuilderInterface, ModelInterface
{
    /**
     * @var QueryBuilder
     */
    public QueryBuilder $queryBuilder;

    /**
     * @param int $id
     *
     * @return $this
     */
    public function find(int $id): self
    {
        $stmt = $this->queryBuilder->prepare("SELECT * FROM titles WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
