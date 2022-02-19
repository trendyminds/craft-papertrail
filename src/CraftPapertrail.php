<?php
/**
 * Craft PaperTrail plugin for Craft CMS 3.x
 *
 * A plugin to connect Craft logs to Papertrail.
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2022 TrendyMinds
 */

namespace trendyminds\craftpapertrail;

use trendyminds\craftpapertrail\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\helpers\UrlHelper;
use craft\services\Plugins;
use craft\events\PluginEvent;

use Rekurzia\Log\PapertrailTarget;

use yii\base\Event;

/**
 * Class CraftPapertrail
 *
 * @author    TrendyMinds
 * @package   CraftPapertrail
 * @since     1.0.0
 *
 */
class CraftPapertrail extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftPapertrail
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ( $event->plugin === $this && !Craft::$app->getRequest()->isConsoleRequest ) {
                    Craft::$app->response->redirect(UrlHelper::cpUrl('settings/plugins/craft-paper-trail'))->send();
                }
            }
        );

        // Add in our components
        $this->addComponents();

        Craft::info(
            Craft::t(
                'craft-paper-trail',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    protected function addComponents()
    {
        $this->set('settings', $this->getSettings());

        $request = Craft::$app->getRequest();
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest() && !$request->getIsLivePreview()) {
            $levels = [
                $this->settings->debug ? 'trace' : '',
                $this->settings->info ? 'info' : '',
                $this->settings->warning ? 'warning' : '',
                $this->settings->error ? 'error' : '',
            ];

            $this->set('profileTarget', [
                'class' => PapertrailTarget::class,
                'levels' => $levels,
                'host' => $this->settings->host,
                'port' => $this->settings->port,
                'additionalPrefix' => function() {
                    return $this->settings->additionalPrefix;
                },
            ]);

            // Attach our log target
            Craft::$app->getLog()->targets['craft-papertrail'] = $this->profileTarget;
        }
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'craft-paper-trail/settings',
            [
                'settings' => $this->getSettings(),
                'config' => Craft::$app->getConfig()->getConfigFromFile('craft-paper-trail'),
            ]
        );
    }
}
