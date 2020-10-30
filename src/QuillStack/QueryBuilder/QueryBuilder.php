<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

use QuillStack\QueryBuilder\Exceptions\IncorrectColumnTypeException;

final class QueryBuilder
{
    /**
     * @var array
     */
    private array $columns;

    /**
     * @var Model
     */
    private Model $model;

    /**
     * @var Entity
     */
    private Entity $entity;

    /**
     * @param string $className
     */
    public function __construct(string $className = '')
    {
        if (empty($className)) {
            return;
        }

        $this->get($className);
    }

    public function get(string $className)
    {
        $this->model = container()->get($className);
        $this->entity = $this->model->entity;
        $this->entity->model = $this->model;

        return $this->model;
    }

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function select($columns = '*'): self
    {
        if (is_string($columns)) {
            $this->columns = explode(',', $columns);

            return $this;
        }

        if (is_array($columns)) {
            $this->columns = $columns;

            return $this;
        }

        throw new IncorrectColumnTypeException('Column type must be string or array');
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return 'SELECT t1.' . implode(', ', $this->columns) . ' FROM `' . $this->entity->table . '` AS t1';
    }
}
