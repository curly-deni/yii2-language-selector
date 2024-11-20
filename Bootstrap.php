<?php

namespace aesis\language;

class Bootstrap implements \yii\base\BootstrapInterface
{
    public $supportedLanguages = [];

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $preferredLanguage = null;

        if (isset($_COOKIE['locale']) && in_array($_COOKIE['locale'], $this->supportedLanguages, true)) {
            $preferredLanguage = (string)$_COOKIE['locale'];
        } else {
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }

        $app->language = $preferredLanguage;
    }
}