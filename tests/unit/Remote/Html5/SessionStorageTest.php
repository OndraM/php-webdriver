<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Remote\DriverCommand;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;

/**
 * @covers \Facebook\WebDriver\Remote\Html5\SessionStorage
 */
class SessionStorageTest extends StorageTestCase
{
    const CLEAR_COMMAND = DriverCommand::CLEAR_SESSION_STORAGE;
    const GET_COMMAND = DriverCommand::GET_SESSION_STORAGE_ITEM;
    const SET_COMMAND = DriverCommand::SET_SESSION_STORAGE_ITEM;
    const GET_KEYS_COMMAND = DriverCommand::GET_SESSION_STORAGE_KEYS;
    const REMOVE_COMMAND = DriverCommand::REMOVE_SESSION_STORAGE_ITEM;
    const SIZE_COMMAND = DriverCommand::GET_SESSION_STORAGE_SIZE;

    /**
     * @return SessionStorage
     */
    protected function getStorageInstance(RemoteExecuteMethod $executor)
    {
        return new SessionStorage($executor);
    }
}
