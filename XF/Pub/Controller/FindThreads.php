<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class FindThreads
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class FindThreads extends XFCP_FindThreads
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        if ($action === 'Started') {
            Listener::allowBannedAccessIfNeeded();
        }

        parent::preDispatchType($action, $params);
    }
}
