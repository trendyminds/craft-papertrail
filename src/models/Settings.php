<?php
/**
 * Craft PaperTrail plugin for Craft CMS 3.x
 *
 * A plugin to connect Craft logs to Papertrail.
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2022 TrendyMinds
 */

namespace trendyminds\craftpapertrail\models;

use trendyminds\craftpapertrail\CraftPapertrail;

use Craft;
use craft\base\Model;

/**
 * @author    TrendyMinds
 * @package   CraftPapertrail
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
     public $enabled = true;
     public $host = '';
     public $port = '';
     public $debug = false;
     public $info = false;
     public $warning = false;
     public $error = true;
     public $additionalPrefix = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['host', 'string'],
            ['port', 'string'],
            ['additionalPrefix', 'default', 'value' => Craft::$app->id],
        ];
    }
}
