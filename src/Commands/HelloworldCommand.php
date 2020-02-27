<?php
declare(strict_types=1);


namespace App\Commands;


use App\Post\Application\PostFinder;
use App\Post\Infrastructure\MySqlPostRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * $bin/console hello-world tutsplus
 */
final class HelloworldCommand extends Command
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;

    }

    protected function configure()
    {
        $this->setName('hello-world')
            ->setDescription('Prints Hello-World!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));
        $postFinder = new PostFinder(new MySqlPostRepository($this->container->get('doctrine')->getManager()));

        try {
            var_dump($postFinder('SOMETHING-NEW-SUP-YOGA-WITH-KIDS')); die;
        } catch (\Exception $e) {
            $this->createNotFoundException($e->getMessage());
        }

    }
}