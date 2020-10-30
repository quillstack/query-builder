<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder;

use PHPUnit\Framework\TestCase;
use QuillStack\DI\Container;
use QuillStack\QueryBuilder\QueryBuilder;

class TestQueryBuilder extends TestCase
{
    /**
     * @var Container
     */
    protected Container $container;

    /**
     * @var QueryBuilder
     */
    protected $qb;

    protected function setUp(): void
    {
        $this->container = new Container();
        $this->qb = $this->container->get(QueryBuilder::class);
    }

}
