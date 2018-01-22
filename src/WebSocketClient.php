<?php
namespace user\ex2\SocketClient;

class WebSocketClient
{
    private $port;
    private $address;
    private $socket;
    private $bufferSize;

    /**
     * WebSocketServer constructor.
     * @param $address
     * @param $port
     * @param int $bufferSize
     */
    public function __construct($address, $port, $bufferSize = 2048)
    {
        $this->address = $address;
        $this->port = $port;
        $this->bufferSize = $bufferSize;
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($this->socket, $this->address, $this->port);
    }


    public function writeMessage($msg)
    {
        socket_write($this->socket, $msg, strlen($msg));
    }

    public function readMessage()
    {
        return socket_read($this->socket, $this->bufferSize);
    }

    public function destroySocket()
    {
        socket_close($this->socket);
    }

}