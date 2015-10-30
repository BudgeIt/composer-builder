<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\InstallerInterface;
use BudgeIt\ComposerBuilder\PackageWrapper;
use BudgeIt\ComposerBuilder\ProcessBuilderTrait;

class Bower implements InstallerInterface
{

    use ProcessBuilderTrait;

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
     * @param PackageWrapper $package
     * @return bool
     */
    public function supports(PackageWrapper $package)
    {
        return file_exists(rtrim($package->getPath(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'bower.json');
    }

    /**
     * Run this installer for the package
     *
     * @param PackageWrapper $package
     * @param bool $isDev
     */
    public function install(PackageWrapper $package, $isDev)
    {
        // TODO: Implement install() method.
    }

}
