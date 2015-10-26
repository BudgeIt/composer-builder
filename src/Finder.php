<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Composer;
use Composer\Package\PackageInterface;

class Finder
{

    /**
     * @var Composer
     */
    private $composer;
    /**
     * @var string
     */
    private $targetPackage;

    /**
     * Finder constructor.
     */
    public function __construct(Composer $composer, $targetPackage)
    {
        $this->composer = $composer;
        $this->targetPackage = $targetPackage;
    }

    /**
     * Get an array of packages that depend on the target package
     *
     * @param bool $isDevMode
     * @return PackageInterface[]
     */
    public function getDependentPackages($isDevMode)
    {
        $packages = [];
        $rootPackage = $this->composer->getPackage();
        if ($this->isDependentPackage($rootPackage, (bool)$isDevMode)) {
            $packages[] = $rootPackage;
        }
        foreach ($this->composer->getRepositoryManager()->getLocalRepository()->getPackages() as $package) {
            if ($this->isDependentPackage($package, $isDevMode)) {
                $packages[] = $package;
            }
        }
        return $packages;
    }

    /**
     * Indicate whether a package has the target package as a dependency
     *
     * @param PackageInterface $package
     * @param bool $devMode
     * @return bool
     */
    private function isDependentPackage(PackageInterface $package, $devMode = false)
    {
        $packages = $package->getRequires();
        if ($devMode) {
            $packages = array_merge($packages, $package->getDevRequires());
        }
        foreach ($packages as $link) {
            if ($this->targetPackage === $link) {
                return true;
            }
        }
        return false;
    }

}
