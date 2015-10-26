<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;
use Composer\Package\PackageInterface;

class Bower implements InstallerInterface
{

    /**
     * Get an identifier for this installer
     *
     * @return string
     */
    public function getName()
    {
        return 'bower';
    }

    /**
     * Indicate whether a package supports this installer
     *
     * @param PackageInterface $package
     * @return bool
     */
    public function supports(PackageInterface $package)
    {
        // TODO: Implement supports() method.
    }

}
