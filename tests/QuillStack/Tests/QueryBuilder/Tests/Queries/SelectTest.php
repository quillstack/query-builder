<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Queries;

use PHPUnit\Framework\TestCase;
use QuillStack\DI\Container;
use QuillStack\QueryBuilder\Exceptions\IncorrectColumnTypeException;
use QuillStack\Tests\QueryBuilder\Mocks\Models\User;

final class SelectTest extends TestCase
{
    /**
     * @var Container
     */
    private Container $container;

    protected function setUp(): void
    {
        $this->container = new Container();
    }

    public function testSimpleSelect()
    {
        $user = $this->container->get(User::class);
        $query = $user->select('*')->getQuery();

        $this->assertEquals('SELECT t1.* FROM `custom_users` AS t1', $query);
    }

    public function testIncorrectColumnTypeException()
    {
        $this->expectException(IncorrectColumnTypeException::class);

        $user = $this->container->get(User::class);
        $user->select(23)->getQuery();
    }
}
