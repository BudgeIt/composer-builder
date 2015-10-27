<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;
use BudgeIt\ComposerBuilder\PackageWrapper;

class Npm implements InstallerInterface
{

    /**
     * Get an identifier for this installer
     *
     * @return string
     */
    public function getName()
    {
        return 'npm';
    }

    /**
     * Indicate whether a package supports this installer
     *
     * @param PackageWrapper $package
     * @return bool
     */
    public function supports(PackageWrapper $package)
    {
        // TODO: Implement supports() method.
    }

    /**
     * Run this installer for the package
     *
     * @param PackageWrapper $package
     */
    public function install(PackageWrapper $package)
    {
        // TODO: Implement install() method.
    }

}
