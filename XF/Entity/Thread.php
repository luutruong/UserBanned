<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Entity;

use Truonglv\UserBanned\Listener;

/**
 * Class Thread
 * @package Truonglv\UserBanned\XF\Entity
 * @inheritdoc
 */
class Thread extends XFCP_Thread
{
    public function canReply(&$error = null)
    {
        $allowed = parent::canReply($error);
        if (!$allowed) {
            return $allowed;
        }

        if (Listener::$visitorIsBanned) {
            if (in_array($this->node_id, $this->app()->options()->tlUserBanned_allowNodes)) {
                return true;
            }

            return false;
        }

        return $allowed;
    }
}
