<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

interface QueryBuilderInterface
{
    /**
     * @param string $columns
     *
     * @return $this
     */
    public function select($columns = '*'): self;

    /**
     * @return string
     */
    public function getQuery(): string;

    /**
     * @return array
     */
    public function get(): array;
}
