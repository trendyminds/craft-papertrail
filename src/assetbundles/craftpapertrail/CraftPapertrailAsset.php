<?php
/**
 * Craft PaperTrail plugin for Craft CMS 3.x
 *
 * A plugin to connect Craft logs to Papertrail.
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2022 TrendyMinds
 */

namespace trendyminds\craftpapertrail\assetbundles\craftpapertrail;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    TrendyMinds
 * @package   CraftPapertrail
 * @since     1.0.0
 */
class CraftPapertrailAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@trendyminds/craftpapertrail/assetbundles/craftpapertrail/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/CraftPapertrail.js',
        ];

        $this->css = [
            'css/CraftPapertrail.css',
        ];

        parent::init();
    }
}
