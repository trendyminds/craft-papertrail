<?php
/**
 * Craft PaperTrail plugin for Craft CMS 3.x
 *
 * A plugin to connect Craft logs to Papertrail.
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2022 TrendyMinds
 */

/**
 * Craft PaperTrail config.php
 *
 * This file exists only as a template for the Craft PaperTrail settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'craft-paper-trail.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    '*' => [
        // This enables sending logs
        "enabled" => true,

        // This specifies the host setting from PaperTrail
        "host" => '',

        // This specifies the port setting from PaperTrail
        "port" => '',

        // This specifies an additional prefix for logs
        "additionalPrefix" => '',

        // This enables debug level logs to be sent to PaperTrail
        "debug" => false,

        // This enables info level logs to be sent to PaperTrail
        "info" => false,

        // This enables warning level logs to be sent to PaperTrail
        "warning" => false,

        // This enables error level logs to be sent to PaperTrail
        "error" => true,
    ],

    'local' => [],

    'staging' => [],

    'production' => [],
];
