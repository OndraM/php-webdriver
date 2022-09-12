<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Remote\DriverCommand;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;

/**
 * @covers \Facebook\WebDriver\Remote\Html5\LocalStorage
 */
class LocalStorageTest extends StorageTestCase
{
    const CLEAR_COMMAND = DriverCommand::CLEAR_LOCAL_STORAGE;
    const GET_COMMAND = DriverCommand::GET_LOCAL_STORAGE_ITEM;
    const SET_COMMAND = DriverCommand::SET_LOCAL_STORAGE_ITEM;
    const GET_KEYS_COMMAND = DriverCommand::GET_LOCAL_STORAGE_KEYS;
    const REMOVE_COMMAND = DriverCommand::REMOVE_LOCAL_STORAGE_ITEM;
    const SIZE_COMMAND = DriverCommand::GET_LOCAL_STORAGE_SIZE;

    /**
     * @return LocalStorage
     */
    protected function getStorageInstance(RemoteExecuteMethod $executor)
    {
        return new LocalStorage($executor);
    }
}
