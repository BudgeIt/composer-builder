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
     * @var string
     */
    private $targetPackage;

    /**
     * Finder constructor.
     */
    public function __construct(Composer $composer, $targetPackage)
    {
        $this->composer = $composer;
        $this->targetPackage = $targetPackage;
    }

    public function getDependentPackages()
    {
    }

}
