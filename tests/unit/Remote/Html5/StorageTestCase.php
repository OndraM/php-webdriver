<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Html5\StorageInterface;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;
use PHPUnit\Framework\TestCase;

abstract class StorageTestCase extends TestCase
{
    const CLEAR_COMMAND = '';
    const GET_COMMAND = '';
    const SET_COMMAND = '';
    const GET_KEYS_COMMAND = '';
    const REMOVE_COMMAND = '';
    const SIZE_COMMAND = '';

    /** @var RemoteExecuteMethod|\PHPUnit\Framework\MockObject\MockObject */
    protected $executor;

    protected function setUp(): void
    {
        $this->executor = $this->getMockBuilder(RemoteExecuteMethod::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testShouldClearStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::CLEAR_COMMAND);

        $storage = $this->getStorageInstance($this->executor);

        $storage->clear();
    }

    public function testShouldReturnItemByKeyFromStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::GET_COMMAND, [':key' => 'thing-one'])
            ->willReturn('value-of-thing-one');

        $storage = $this->getStorageInstance($this->executor);

        $value = $storage->getItem('thing-one');
        $this->assertSame('value-of-thing-one', $value);
    }

    public function testShouldReturnAllKeysInStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::GET_KEYS_COMMAND)
            ->willReturn(['key1', 'key2', 'key3']);

        $storage = $this->getStorageInstance($this->executor);

        $value = $storage->keySet();
        $this->assertSame(['key1', 'key2', 'key3'], $value);
    }

    public function testShouldRemoveItemFromStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::REMOVE_COMMAND);

        $storage = $this->getStorageInstance($this->executor);

        $storage->removeItem('item2');
    }

    public function testShouldSetItemInStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::SET_COMMAND, ['key' => 'key2', 'value' => 'value2']);

        $storage = $this->getStorageInstance($this->executor);

        $storage->setItem('key2', 'value2');
    }

    public function testShouldReturnNumberOfItemsInStorage()
    {
        $this->executor->expects($this->once())
            ->method('execute')
            ->with(static::SIZE_COMMAND)
            ->willReturn(7);

        $storage = $this->getStorageInstance($this->executor);

        $size = $storage->size();
        $this->assertSame(7, $size);
    }

    /** @return StorageInterface */
    abstract protected function getStorageInstance(RemoteExecuteMethod $executor);
}
