<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

use QuillStack\QueryBuilder\Exceptions\IncorrectColumnTypeException;

class Model
{
    private array $columns;

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
