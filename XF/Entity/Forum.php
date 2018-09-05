<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned\XF\Entity;

use Truonglv\UserBanned\Listener;

/**
 * Class Forum
 * @package Truonglv\UserBanned\XF\Entity
 * @inheritdoc
 */
class Forum extends XFCP_Forum
{
    public function canCreateThread(&$error = null)
    {
        $allowed = parent::canCreateThread($error);
        if (!$allowed) {
            return $allowed;
        }

        if (Listener::$allowCreateThread) {
            return true;
        } elseif (Listener::$visitorIsBanned) {
            if (in_array($this->node_id, $this->app()->options()->tlUserBanned_allowNodes)) {
                return true;
            }

            // use own error phrase
            $error = \XF::phrase('tl_user_banned_your_account_banned_cannot_post');

            return false;
        }

        return $allowed;
    }
}
