<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;

class Runner
{

    /**
     * @var Composer
     */
    private $composer;
    /**
     * @var IOInterface
     */
    private $io;
    /**
     * @var InstallerInterface[]
     */
    private $installers = [];
    /**
     * @var BuildToolInterface[]
     */
    private $buildTools = [];

    /**
     * Runner constructor.
     */
    public function __construct(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
    }

    public function registerInstaller(InstallerInterface $installer)
    {
        $this->installers[$installer->getName()] = $installer;
    }

    public function registerBuildTool(BuildToolInterface $buildTool)
    {
        $this->buildTools[$buildTool->getName()] = $buildTool;
    }

    public function runInstallers(PackageInterface $package)
    {
    }

    public function runBuildTools(PackageInterface $package)
    {
    }

}
