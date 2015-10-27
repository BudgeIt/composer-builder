<?php

namespace BudgeIt\ComposerBuilder;

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
     * @param PackageWrapper $package
     * @return bool
     */
    public function supports(PackageWrapper $package);

    /**
     * Run this installer for the package
     *
     * @param PackageWrapper $package
     */
    public function install(PackageWrapper $package);

}
