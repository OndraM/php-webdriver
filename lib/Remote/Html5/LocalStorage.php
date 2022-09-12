<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Html5\LocalStorageInterface;
use Facebook\WebDriver\Remote\DriverCommand;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;

/**
 * Executes the commands to access HTML5 localStorage on the remote webdriver server.
 */
class LocalStorage implements LocalStorageInterface
{
    /**
     * @var RemoteExecuteMethod
     */
    private $executor;

    /**
     * @param RemoteExecuteMethod $executor
     */
    public function __construct(RemoteExecuteMethod $executor)
    {
        $this->executor = $executor;
    }

    public function clear()
    {
        $this->executor->execute(DriverCommand::CLEAR_LOCAL_STORAGE);
    }

    public function offsetGet($key)
    {
        return $this->executor->execute(DriverCommand::GET_LOCAL_STORAGE_ITEM, [
            ':key' => $key,
        ]);
    }

    public function offsetExists($key)
    {
        return $this->offsetGet($key) !== null;
    }

    public function allKeys()
    {
        return $this->executor->execute(DriverCommand::GET_LOCAL_STORAGE_KEYS);
    }

    public function offsetUnset($key)
    {
        $this->executor->execute(DriverCommand::REMOVE_LOCAL_STORAGE_ITEM, [
            ':key' => $key,
        ]);
    }

    public function offsetSet($key, $value)
    {
        $this->executor->execute(DriverCommand::SET_LOCAL_STORAGE_ITEM, [
            'key' => $key,
            'value' => $value,
        ]);
    }

    public function count()
    {
        return $this->executor->execute(DriverCommand::GET_LOCAL_STORAGE_SIZE);
    }
}
