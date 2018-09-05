<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use Truonglv\UserBanned\Listener;

/**
 * Class Forum
 * @package Truonglv\UserBanned\XF\Pub\Controller
 * @inheritdoc
 */
class Forum extends XFCP_Forum
{
    protected function preDispatchType($action, ParameterBag $params)
    {
        Listener::allowBannedAccessIfNeeded();

        parent::preDispatchType($action, $params);
    }

    public function actionForum(ParameterBag $params)
    {
        Listener::$allowCreateThread = true;
        $response = parent::actionForum($params);
        Listener::$allowCreateThread = false;

        return $response;
    }
}
