<?php

if (!function_exists('user_time')) {
    /**
     * Convert UTC datetime to user's local timezone
     */
    function user_time($utc_datetime, $user_timezone = 'Asia/Jakarta', $format = 'Y-m-d H:i:s')
    {
        try {
            $date = new DateTime($utc_datetime, new DateTimeZone('UTC'));
            $date->setTimezone(new DateTimeZone($user_timezone));
            return $date->format($format);
        } catch (Exception $e) {
            return $utc_datetime;
        }
    }
}
