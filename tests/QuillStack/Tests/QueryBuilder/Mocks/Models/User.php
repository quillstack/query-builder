<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Mocks\Models;

use QuillStack\QueryBuilder\Model;
use QuillStack\Tests\QueryBuilder\Mocks\Entities\UserEntity;

final class User extends Model
{
    public UserEntity $entity;
}
