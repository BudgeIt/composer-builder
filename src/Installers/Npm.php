<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;
use Composer\Package\PackageInterface;

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
     * @param PackageInterface $package
     * @return bool
     */
    public function supports(PackageInterface $package)
    {
        // TODO: Implement supports() method.
    }

    /**
     * Run this installer for the package
     *
     * @param PackageInterface $package
     */
    public function install(PackageInterface $package)
    {
        // TODO: Implement install() method.
    }

}
