<?php
/**
 * @project yii2-cmf-basic-page
 * @author  Nick Denry
 */
namespace nickdenry\cmf\pages\basic;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if (!isset($app->get('i18n')->translations['cmfBasicPage*'])) {
            $app->get('i18n')->translations['cmfBasicPage*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => __DIR__ . '/messages',
                'sourceLanguage' => 'en-US',
            ];
        }
        Yii::setAlias('cmfBasicPage', __DIR__);
    }
}
