<?php

namespace BudgeIt\ComposerBuilder;

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
     * @param PackageWrapper $package
     * @return bool
     */
    public function supports(PackageWrapper $package);

    /**
     * Run this build tool for this package
     *
     * @param PackageWrapper $package
     * @param bool $isDev
     */
    public function build(PackageWrapper $package, $isDev);

}
