<?php

namespace user\ex2\SocketClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExecWebSocketClient extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:cliApp')
            ->addArgument('address', InputArgument::REQUIRED)
            ->addArgument('port', InputArgument::REQUIRED)
            ->addArgument('sequence', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $address = $input->getArgument('address');
        $port = $input->getArgument('port');
        $sequence = $input->getArgument('sequence');
        $WebSocketServer = new WebSocketClient($address,$port);
        $WebSocketServer->writeMessage($sequence);
        $out = $WebSocketServer->readMessage();
        $output->writeln($out);
        $WebSocketServer->destroySocket();
    }

}