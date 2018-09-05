<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class Index
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class Index extends XFCP_Index
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        if (strpos($this->app->router()->getIndexRoute(), 'forums') === 0) {
            Listener::allowBannedAccessIfNeeded();
        }

        parent::preDispatchType($action, $params);
    }
}
