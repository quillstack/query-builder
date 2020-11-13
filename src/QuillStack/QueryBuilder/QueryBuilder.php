<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

use PDO;
use QuillStack\ParameterBag\ParameterBag;
use QuillStack\QueryBuilder\Connection\MySqlConnector;
use QuillStack\QueryBuilder\Exceptions\IncorrectColumnTypeException;
use QuillStack\QueryBuilder\Model\Model;

class QueryBuilder implements QueryBuilderInterface
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
     * @var ParameterBag
     */
    private ParameterBag $params;

    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = new ParameterBag($params);

        $connector = new MySqlConnector($this->params);
        $this->connection = $connector->getConnection();
    }

    public function prepare(string $query)
    {
        return $this->connection->prepare($query);
    }

    /**
     * @param Model $model
     *
     * @return $this
     */
    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function getQuery(): string
    {
        return 'SELECT t1.' . implode(', ', $this->columns) . ' FROM `' . $this->model->entity->table . '` AS t1';
    }

    /**
     * {@inheritDoc}
     */
    public function get(): array
    {
        return [];
    }
}
