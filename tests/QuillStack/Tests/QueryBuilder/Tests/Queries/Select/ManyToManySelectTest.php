<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Queries\Select;

use QuillStack\QueryBuilder\Relations\ManyToMany;
use QuillStack\Tests\QueryBuilder\Mocks\Models\Book;
use QuillStack\Tests\QueryBuilder\TestQueryBuilder;

final class ManyToManySelectTest extends TestQueryBuilder
{
    public function testManyToManySelect()
    {
        $book = $this->container->get(Book::class);

        $this->assertInstanceOf(ManyToMany::class, $book->entity->libraries());
    }
}
