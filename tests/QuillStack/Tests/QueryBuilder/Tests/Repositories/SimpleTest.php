<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Repositories;

use QuillStack\Tests\QueryBuilder\Mocks\Repositories\BookRepository;
use QuillStack\Tests\QueryBuilder\TestQueryBuilder;

final class SimpleTest extends TestQueryBuilder
{
    public function testRepository()
    {
        $bookRepository = $this->container->get(BookRepository::class);

        $this->assertIsArray($bookRepository->findAll());
    }
}
