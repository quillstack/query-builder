<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Queries\Select;

use QuillStack\QueryBuilder\Relations\OneToOne;
use QuillStack\Tests\QueryBuilder\Mocks\Models\Book;
use QuillStack\Tests\QueryBuilder\TestQueryBuilder;

final class OneToOneSelectTest extends TestQueryBuilder
{
    public function testOneToOne()
    {
        $book = $this->container->get(Book::class);

        $this->assertInstanceOf(OneToOne::class, $book->entity->title());
    }
}
