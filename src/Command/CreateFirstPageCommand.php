<?php

namespace MinimalOriginal\PageBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use MinimalOriginal\PageBundle\Entity\Page;

class CreateFirstPageCommand extends ContainerAwareCommand
{
    protected function configure()
    {
      $this
          ->setName('minimal_page:create-first-page')
          ->setDescription('Creates the first page of the site.')
          ->setHelp('This command allows you to create a first page for the website.')
      ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'First page creator',
            '============',
            '',
        ]);
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();
        $page = new Page();
        $page->setTitle("Première page");
        $page->setContent("Ceci est la première page de mon site.");

        $em->persist($page);
        $em->flush();

        $output->writeln('The first page has been successfully generated!');


    }
}
