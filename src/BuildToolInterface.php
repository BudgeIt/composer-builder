<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Package\PackageInterface;

interface BuildToolInterface
{

    /**
     * Get an identifier for this build tool
     *
     * @return string
     */
    public function getName();

    /**
     * Indicate whether a package supports this build tool
     *
     * @param PackageInterface $package
     * @return bool
     */
    public function supports(PackageInterface $package);

    /**
     * Run this build tool for this package
     *
     * @param PackageInterface $package
     */
    public function build(PackageInterface $package);

}
