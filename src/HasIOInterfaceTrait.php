<?php
namespace BudgeIt\ComposerBuilder;

use Composer\IO\IOInterface;

trait HasIOInterfaceTrait
{

    /**
     * @var IOInterface
     */
    protected $io;

    /**
     * @return IOInterface
     */
    public function getIo()
    {
        return $this->io;
    }

    /**
     * @param IOInterface $io
     */
    public function setIo(IOInterface $io)
    {
        $this->io = $io;
    }

}
