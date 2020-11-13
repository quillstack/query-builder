<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder\Connection;

use PDO;
use QuillStack\ParameterBag\ParameterBag;

final class MySqlConnector implements ConnectorInterface
{
    /**
     * @var ParameterBag
     */
    private ParameterBag $params;

    /**
     * @param ParameterBag $params
     */
    public function __construct(ParameterBag $params)
    {
        $this->params = $params;
    }

    /**
     * {@inheritDoc}
     */
    public function getConnection(): PDO
    {
        return new PDO(
            'mysql:host=' . $this->params->get('host') . ';dbname=' . $this->params->get('name'),
            $this->params->get('user'),
            $this->params->get('pass')
        );
    }
}
