<?php

namespace BudgeIt\ComposerBuilder;

use BudgeIt\ComposerBuilder\Installers\Bower;
use BudgeIt\ComposerBuilder\Installers\Npm;
use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;
use Symfony\Component\Process\ProcessBuilder;

class Plugin implements PluginInterface, EventSubscriberInterface
{

    const PACKAGE = 'budgeit/composer-builder';

    /**
     * @var Runner
     */
    private $runner;
    /**
     * @var Finder
     */
    private $finder;

    /**
     * Apply plugin modifications to composer
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->runner = new Runner($composer, $io);
        $processBuilder = new ProcessBuilder();
        $this->runner->registerInstaller((new Npm())->setProcessBuilder($processBuilder));
        $this->runner->registerInstaller((new Bower())->setProcessBuilder($processBuilder));
        $this->finder = new Finder($composer, static::PACKAGE);
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     * * The method name to call (priority defaults to 0)
     * * An array composed of the method name to call and the priority
     * * An array of arrays composed of the method names to call and respective
     *   priorities, or 0 if unset
     *
     * For instance:
     *
     * * array('eventName' => 'methodName')
     * * array('eventName' => array('methodName', $priority))
     * * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            ScriptEvents::POST_INSTALL_CMD => [['runInstallers', 10], ['runBuildTools', 5]],
            ScriptEvents::POST_UPDATE_CMD => [['runInstallers', 10], ['runBuildTools', 5]],
        ];
    }

    /**
     * Run the installers
     *
     * @param Event $event
     */
    public function runInstallers(Event $event)
    {
        foreach ($this->finder->getDependentPackages($event->isDevMode()) as $package) {
            $this->runner->runInstallers($package, $event->isDevMode());
        }
    }

    /**
     * Run the build tools
     *
     * @param Event $event
     */
    public function runBuildTools(Event $event)
    {
        foreach ($this->finder->getDependentPackages($event->isDevMode()) as $package) {
            $this->runner->runBuildTools($package, $event->isDevMode());
        }
    }

}
