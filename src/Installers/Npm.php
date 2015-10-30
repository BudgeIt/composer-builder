<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\ExecutorTrait;
use BudgeIt\ComposerBuilder\HasIOInterfaceTrait;
use BudgeIt\ComposerBuilder\InstallerInterface;
use BudgeIt\ComposerBuilder\PackageWrapper;
use Composer\IO\IOInterface;
use Exception;

class Npm implements InstallerInterface
{

    use ExecutorTrait, HasIOInterfaceTrait;

    public function __construct(IOInterface $io)
    {
        $this->io = $io;
    }

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
     * @param bool $isDev
     * @throws Exception if an exception occurs during execution
     */
    public function install(PackageWrapper $package, $isDev)
    {
        $args = ['install'];
        if (!$isDev) {
            $args[] = '--production';
        }
        $this->execute('npm', $args, $this->io, $package->getPath());
    }

}
