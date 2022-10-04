<?php

namespace Facebook\WebDriver\Interactions\Touch;

use Facebook\WebDriver\WebDriverAction;

class WebDriverDoubleTapAction extends WebDriverTouchAction implements WebDriverAction
{
    public function perform(): void
    {
        $this->touchScreen->doubleTap($this->locationProvider);
    }
}
