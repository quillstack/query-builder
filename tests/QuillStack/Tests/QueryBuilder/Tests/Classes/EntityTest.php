<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Tests\Classes;

use PHPUnit\Framework\TestCase;
use QuillStack\Tests\QueryBuilder\Mocks\Entities\BookEntity;
use QuillStack\Tests\QueryBuilder\Mocks\Entities\UserEntity;

final class EntityTest extends TestCase
{
    public function testEntityCustomTableName()
    {
        $userEntity = new UserEntity();

        $this->assertEquals('custom_users', $userEntity->table);
    }

    public function testEntityDefaultTableName()
    {
        $bookEntity = new BookEntity();

        $this->assertEquals('books', $bookEntity->table);
    }
}
