<?php

namespace Facebook\WebDriver\Remote\Html5;

use Facebook\WebDriver\Html5\WebStorageInterface;
use Facebook\WebDriver\Remote\RemoteExecuteMethod;

/**
 * Provides remote access to the WebStorage API.
 */
class WebStorage implements WebStorageInterface
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

    public function getLocalStorage()
    {
        return new LocalStorage($this->executor);
    }

    public function getSessionStorage()
    {
        return new SessionStorage($this->executor);
    }
}
