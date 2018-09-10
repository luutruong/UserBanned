<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use Truonglv\UserBanned\Listener;
use XF\Mvc\ParameterBag;

/**
 * Class WhatsNewPost
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class WhatsNewPost extends XFCP_WhatsNewPost
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        Listener::allowBannedAccessIfNeeded();

        parent::preDispatchType($action, $params);
    }
}
