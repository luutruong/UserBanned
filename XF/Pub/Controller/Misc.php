<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class Misc
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class Misc extends XFCP_Misc
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        if ($action === 'Contact') {
            Listener::allowBannedAccessIfNeeded();
        }

        parent::preDispatchType($action, $params);
    }
}
