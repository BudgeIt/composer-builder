<?php

namespace BudgeIt\ComposerBuilder\BuildTools;

use BudgeIt\ComposerBuilder\BuildToolInterface;
use BudgeIt\ComposerBuilder\ExecutorTrait;
use BudgeIt\ComposerBuilder\HasIOInterfaceTrait;
use BudgeIt\ComposerBuilder\PackageWrapper;
use Composer\IO\IOInterface;
use Exception;

class Grunt implements BuildToolInterface
{

    use ExecutorTrait, HasIOInterfaceTrait;

    public function __construct(IOInterface $io)
    {
        $this->io = $io;
    }

    /**
     * Get an identifier for this build tool
     *
     * @return string
     */
    public function getName()
    {
        return 'grunt';
    }

    /**
     * Indicate whether a package supports this build tool
     *
     * @param PackageWrapper $package
     * @return bool
     */
    public function supports(PackageWrapper $package)
    {
        return file_exists(rtrim($package->getPath(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Gruntfile.js');
    }

    /**
     * Run this build tool for this package
     *
     * @param PackageWrapper $package
     * @param bool $isDev
     */
    public function build(PackageWrapper $package, $isDev)
    {
        $this->execute('grunt', [], $this->io, $package->getPath());
    }
}
