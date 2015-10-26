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

    /**
     * Register a new installer object
     *
     * @param InstallerInterface $installer
     */
    public function registerInstaller(InstallerInterface $installer)
    {
        $this->installers[$installer->getName()] = $installer;
    }

    /**
     * Register a new build tool object
     *
     * @param BuildToolInterface $buildTool
     */
    public function registerBuildTool(BuildToolInterface $buildTool)
    {
        $this->buildTools[$buildTool->getName()] = $buildTool;
    }

    /**
     * Run the installers for a package
     *
     * @param PackageInterface $package
     */
    public function runInstallers(PackageInterface $package)
    {
        foreach ($this->installers as $installer) {
            if ($installer->supports($package)) {
                $installer->install($package);
            }
        }
    }

    /**
     * Run the build tools for a package
     *
     * @param PackageInterface $package
     */
    public function runBuildTools(PackageInterface $package)
    {
        foreach ($this->buildTools as $buildTool) {
            if ($buildTool->supports($package)) {
                $buildTool->build($package);
            }
        }
    }

}
