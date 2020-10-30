<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Mocks\Repositories;

use QuillStack\Tests\QueryBuilder\Mocks\Models\Book;

final class BookRepository
{
    public Book $book;

    public function findAll()
    {
        return $this->book->select('*')->get();
    }
}
