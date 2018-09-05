<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\UserBanned;

class Listener
{
    public static $allowCreateThread = false;
    public static $visitorIsBanned = false;

    public static function allowBannedAccessIfNeeded()
    {
        $visitor = \XF::visitor();
        if ($visitor->is_banned && \XF::options()->tlUserBanned_view) {
            $visitor->is_banned = false;

            self::$visitorIsBanned = true;
        }
    }
}
