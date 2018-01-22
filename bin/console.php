<?
use Symfony\Component\Console\Application;
use user\ex2\SocketClient\ExecWebSocketClient;
require __DIR__ . '/../vendor/autoload.php';

$application = new Application();
$application->add(new ExecWebSocketClient());
$application->run();