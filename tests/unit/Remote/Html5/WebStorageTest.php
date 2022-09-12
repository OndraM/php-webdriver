<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Html5\LocalStorageInterface;
use Facebook\WebDriver\Html5\SessionStorageInterface;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Facebook\WebDriver\Remote\Html5\WebStorage
 */
class WebStorageTest extends TestCase
{
    /** @var RemoteExecuteMethod|\PHPUnit\Framework\MockObject\MockObject */
    private $executor;

    protected function setUp(): void
    {
        $this->executor = $this->getMockBuilder(RemoteExecuteMethod::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testShouldReturnLocalStorage()
    {
        $storage = new WebStorage($this->executor);

        $local = $storage->getLocalStorage();
        $this->assertInstanceOf(LocalStorage::class, $local);
        $this->assertInstanceOf(LocalStorageInterface::class, $local);
    }

    public function testShouldReturnSessionStorage()
    {
        $storage = new WebStorage($this->executor);

        $session = $storage->getSessionStorage();
        $this->assertInstanceOf(SessionStorage::class, $session);
        $this->assertInstanceOf(SessionStorageInterface::class, $session);
    }
}
