<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Package\PackageInterface;

class PackageWrapper
{

    /**
     * @var PackageInterface
     */
    private $package;
    /**
     * @var string
     */
    private $path;

    /**
     * @param PackageInterface $package
     * @param string $path
     */
    public function __construct(PackageInterface $package, $path)
    {
        $this->package = $package;
        $this->path = $path;
    }

    /**
     * @return PackageInterface
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

}
