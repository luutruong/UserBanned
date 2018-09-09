<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class Search
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class Search extends XFCP_Search
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        Listener::allowBannedAccessIfNeeded();

        parent::preDispatchType($action, $params);
    }
}
