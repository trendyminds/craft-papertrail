# Craft PaperTrail plugin for Craft CMS 3.x

A plugin to connect Craft logs to Papertrail.

![Screenshot](resources/img/plugin-logo.svg)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require trendyminds/craft-paper-trail

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Craft PaperTrail.

## Craft PaperTrail Overview

[Papertrail](https://www.papertrail.com/) is a logging solution that is lowcost and simple to use. This plugin utilizes the "port" based log destination created in the Papertrail portal and sends Craft logs using a custom Yii log target.

## Configuring Craft PaperTrail
You can either configure the plugin using the settings page or by using a configuration file.
Copy 'config.php' to 'craft/config' then rename config to 'craft-paper-trail.php.

Brought to you by [TrendyMinds](https://trendyminds.com)
