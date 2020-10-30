<?php

declare(strict_types=1);

namespace QuillStack\QueryBuilder;

use QuillStack\QueryBuilder\Relations\ManyToMany;
use QuillStack\QueryBuilder\Relations\OneToMany;
use QuillStack\QueryBuilder\Relations\OneToOne;

class Entity
{
    /**
     * @var string
     */
    public string $table;

    /**
     * @var array
     */
    public array $columnsMapping = [];

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

    /**
     * @param string $className
     *
     * @return OneToOne
     */
    protected function oneToOne(string $className): OneToOne
    {
        return new OneToOne();
    }

    /**
     * @param string $className
     *
     * @return OneToMany
     */
    protected function oneToMany(string $className): OneToMany
    {
        return new OneToMany();
    }

    /**
     * @param string $className
     *
     * @return ManyToMany
     */
    protected function manyToMany(string $className): ManyToMany
    {
        return new ManyToMany();
    }
}
