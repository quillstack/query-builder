<?php

declare(strict_types=1);

namespace QuillStack\Tests\QueryBuilder\Mocks\Entities;

use QuillStack\QueryBuilder\Entity\Entity;
use QuillStack\QueryBuilder\Model\Model;
use QuillStack\QueryBuilder\Relations\ManyToMany;
use QuillStack\QueryBuilder\Relations\OneToMany;
use QuillStack\QueryBuilder\Relations\OneToOne;

final class BookEntity extends Entity
{
    /**
     * @var Model
     */
    public Model $model;

    /**
     * {@inheritDoc}
     */
    public array $columnsMapping = [
        'isbnNumber' => 'isbn_number',
    ];

    public function title(): OneToOne
    {
        return $this->oneToOne(TitleEntity::class);
    }

    public function authors(): OneToMany
    {
        return $this->oneToMany(AuthorEntity::class);
    }

    public function libraries(): ManyToMany
    {
        return $this->manyToMany(LibraryEntity::class);
    }
}
