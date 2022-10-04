<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Exception\WebDriverException;

/**
 * Provides helper methods for checkboxes.
 */
class WebDriverCheckboxes extends AbstractWebDriverCheckboxOrRadio
{
    public function __construct(WebDriverElement $element)
    {
        parent::__construct($element);

        $this->type = $element->getAttribute('type');
        if ($this->type !== 'checkbox') {
            throw new WebDriverException('The input must be of type "checkbox".');
        }
    }

    public function isMultiple()
    {
        return true;
    }

    public function deselectAll(): void
    {
        foreach ($this->getRelatedElements() as $checkbox) {
            $this->deselectOption($checkbox);
        }
    }

    public function deselectByIndex($index): void
    {
        $this->byIndex($index, false);
    }

    public function deselectByValue($value): void
    {
        $this->byValue($value, false);
    }

    public function deselectByVisibleText($text): void
    {
        $this->byVisibleText($text, false, false);
    }

    public function deselectByVisiblePartialText($text): void
    {
        $this->byVisibleText($text, true, false);
    }
}
