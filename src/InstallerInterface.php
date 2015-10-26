<?php

namespace BudgeIt\ComposerBuilder;

use Composer\Package\PackageInterface;

interface InstallerInterface
{

    /**
     * Get an identifier for this installer
     *
     * @return string
     */
    public function getName();

    /**
     * Indicate whether a package supports this installer
     *
     * @param PackageInterface $package
     * @return bool
     */
    public function supports(PackageInterface $package);

}
