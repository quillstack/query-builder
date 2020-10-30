<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Mocks\Models;

use QuillStack\QueryBuilder\Model;
use QuillStack\QueryBuilder\Relations\ManyToMany;
use QuillStack\QueryBuilder\Relations\OneToMany;
use QuillStack\QueryBuilder\Relations\OneToOne;
use QuillStack\Tests\QueryBuilder\Mocks\Entities\BookEntity;

final class Book extends Model
{
    /**
     * @var BookEntity
     */
    public BookEntity $entity;

    /**
     * @var string
     */
    public string $isbnNumber;

    /**
     * @var OneToOne
     */
    public OneToOne $title;

    /**
     * @var OneToMany
     */
    public OneToMany $authors;

    /**
     * @var ManyToMany
     */
    public ManyToMany $libraries;
}
