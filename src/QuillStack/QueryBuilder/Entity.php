<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

class Entity
{
    public string $table;

    public function __construct()
    {
        $this->table ??= $this->guessTableName();
    }

    /**
     * @return string
     */
    private function guessTableName(): string
    {
        $classWithNamespace = explode('\\', static::class);
        $className = array_pop($classWithNamespace);
        $table = str_replace('Entity', '', $className);

        return strtolower("{$table}s");
    }
}
