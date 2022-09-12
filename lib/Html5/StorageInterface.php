<?php

namespace Facebook\WebDriver\Html5;

/**
 * Represents common operations available for all web storage types (session or local).
 */
interface StorageInterface extends \Countable, \ArrayAccess
{
    /**
     * Remove all the items from the storage.
     */
    public function clear();

    /**
     * Retrieve an item from the storage.
     *
     * @param string $key
     *
     * @return string
     */
    public function offsetGet($key);

    /**
     * Get all the keys in storage.
     *
     * @return string[]
     */
    public function allKeys();

    /**
     * Remove a single item from the storage.
     *
     * @param string $key
     */
    public function offsetUnset($key);

    /**
     * Set an item in the storage.
     *
     * @param string $key
     * @param string $value
     */
    public function offsetSet($key, $value);

    /**
     * @param string $key
     * @return bool
     */
    public function offsetExists($key);

    /**
     * Get the number of keys in the storage.
     *
     * @return int
     */
    public function count();
}
