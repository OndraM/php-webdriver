<?php

namespace Facebook\WebDriver\Interactions\Internal;

use Facebook\WebDriver\WebDriverAction;

class WebDriverDoubleClickAction extends WebDriverMouseAction implements WebDriverAction
{
    public function perform(): void
    {
        $this->mouse->doubleClick($this->getActionLocation());
    }
}
