<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Queries\Select;

use QuillStack\QueryBuilder\Relations\OneToMany;
use QuillStack\Tests\QueryBuilder\Mocks\Models\Book;
use QuillStack\Tests\QueryBuilder\TestQueryBuilder;

final class OneToManySelectTest extends TestQueryBuilder
{
    public function testSimpleOneToMany()
    {
        $book = $this->qb->get(Book::class);

        $this->assertInstanceOf(OneToMany::class, $book->entity->authors());
    }
}
