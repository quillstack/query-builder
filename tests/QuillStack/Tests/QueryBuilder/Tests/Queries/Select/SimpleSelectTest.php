<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Queries;

use QuillStack\QueryBuilder\Exceptions\IncorrectColumnTypeException;
use QuillStack\Tests\QueryBuilder\Mocks\Models\Book;
use QuillStack\Tests\QueryBuilder\Mocks\Models\User;
use QuillStack\Tests\QueryBuilder\TestQueryBuilder;

final class SimpleSelectTest extends TestQueryBuilder
{
    public function testSimpleSelect()
    {
        $user = $this->qb->get(User::class);
        $query = $this->qb->select('*')->getQuery();

        $this->assertEquals('custom_users', $user->entity->table);
        $this->assertEquals('SELECT t1.* FROM `custom_users` AS t1', $query);
    }

    public function testGuessTableNameSelect()
    {
        $book = $this->qb->get(Book::class);

        $this->assertEquals('books', $book->entity->table);
    }

    public function testIncorrectColumnTypeException()
    {
        $this->expectException(IncorrectColumnTypeException::class);

        $this->qb->get(User::class);
        $this->qb->select(23)->getQuery();
    }
}
