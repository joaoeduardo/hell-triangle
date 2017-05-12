<?php declare(strict_types = 1);

namespace JoaoEduardo\HellTriangle;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputArgument, InputInterface};
use Symfony\Component\Console\Output\OutputInterface;

class MaximumCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('maximum')
            ->setDescription('Maximum command')
            ->addArgument('triangle', InputArgument::REQUIRED, 'The triangle of numbers');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // get triangle data as multidimensional array
        $triangle = json_decode($input->getArgument('triangle'), true);

        // get triangle height
        $height = count($triangle);

        // get triangle width
        $width = count(end($triangle));

        // verify if root array has at least two values
        if ($height < 2) throw new \LengthException("Triangle is smaller than necessary");

        // verify if last root array value has the same size of root array
        if ($width != $height) throw new \DomainException("Triangle is not equilateral");

        // iterate from the penultimate index to top on root array
        for ($i = $height - 2; $i >= 0 ; $i--) {
            // sum each item with its nearest elements and saves the bigger value
            for ($j = 0; $j <= $i ; $j++) {
                $triangle[$i][$j] += max($triangle[$i + 1][$j], $triangle[$i + 1][$j + 1]);
            }
        }

        // output the result
        $output->writeln($triangle[0][0]);
    }
}