<?php

namespace BudgeIt\ComposerBuilder\Installers;

use BudgeIt\ComposerBuilder\HasIOInterfaceTrait;
use BudgeIt\ComposerBuilder\InstallerInterface;
use BudgeIt\ComposerBuilder\PackageWrapper;
use BudgeIt\ComposerBuilder\ProcessBuilderTrait;
use Composer\IO\IOInterface;
use Exception;

class Bower implements InstallerInterface
{

    use ProcessBuilderTrait, HasIOInterfaceTrait;

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
     * @throws Exception if an exception occurs during execution
     */
    public function install(PackageWrapper $package, $isDev)
    {
        $oldCwd = getcwd();
        $args = ['bower', 'install'];
        $e = false;
        if (!$isDev) {
            $args[] = '--production';
        }
        try {
            $this->getProcessBuilder()
                ->setWorkingDirectory($package->getPath())
                ->setPrefix([])
                ->setArguments($args)
                ->getProcess()
                ->run();
        } catch (Exception $e) {
        } finally {
            $this->getProcessBuilder()
                ->setPrefix([])
                ->setArguments([])
                ->setWorkingDirectory($oldCwd);
            if ($e) {
                throw $e;
            }
        }
    }

}
