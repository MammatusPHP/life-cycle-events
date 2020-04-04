<?php declare(strict_types=1);

use Mammatus\CommandCreator;
use Mammatus\CommandLocator;
use Silly\Application;

return (function () {
    return [
        Application::class => \DI\factory(function (CommandCreator $commandFactory, string $name, string $version) {
            $app = new Application($name, $version);
            foreach (CommandLocator::locate() as $class) {
                $app->command(...$commandFactory->create($class));
            }
            $app->setAutoExit(false);

            return $app;
        })
        ->parameter('name', \DI\get('config.app.name'))
        ->parameter('version', \DI\get('config.app.version')),
    ];
})();
