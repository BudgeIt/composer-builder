<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;
use BudgeIt\ComposerBuilder\PackageWrapper;
use BudgeIt\ComposerBuilder\ProcessBuilderTrait;

class Npm implements InstallerInterface
{

    use ProcessBuilderTrait;

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
        return file_exists(rtrim($package->getPath(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'package.json');
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
