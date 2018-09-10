<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class Logout
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class Logout extends XFCP_Logout
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        Listener::allowBannedAccessIfNeeded();

        parent::preDispatchType($action, $params);
    }
}
