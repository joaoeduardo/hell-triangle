<?php

declare(strict_types=1);

use JoaoEduardo\HellTriangle\MaximumCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Tester\CommandTester;

final class MaximumTest extends TestCase
{
    public function testResult(): void
    {
        $application = new Application();
        $application->add(new MaximumCommand());

        $command = $application->find('maximum');

        $tester = new CommandTester($command);

        $tester->execute([
            'command' => $command->getName(),
            'triangle' => '[[6],[3,5],[9,7,1],[4,6,8,4]]'
        ]);

        $this->assertRegexp('/26/', $tester->getDisplay());
    }

    public function testEmptyArgs(): void
    {
        $this->expectException(RuntimeException::class);

        $application = new Application();
        $application->add(new MaximumCommand());

        $command = $application->find('maximum');

        $tester = new CommandTester($command);

        $tester->execute([
            'command' => $command->getName()
        ]);
    }
}