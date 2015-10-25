<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Composer;

class Finder
{

    /**
     * @var Composer
     */
    private $composer;

    /**
     * Finder constructor.
     */
    public function __construct(Composer $composer)
    {
        $this->composer = $composer;
    }

}
