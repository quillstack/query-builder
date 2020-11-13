<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder\Connection;

interface ConnectorInterface
{
    /**
     * @return object
     */
    public function getConnection(): object;
}
