<?php

class ManifestAssets extends Object implements TemplateGlobalProvider
{
    public static $base_path = '';

    public static $file_name = 'manifest.json';

    private static $manifest_cache;

    public static function get_template_global_variables()
    {
        return array(
            'ManifestAsset' => 'getPath',
        );
    }

    public static function getPath($asset)
    {
        $manifest = self::getManifest();

        if (isset($manifest[$asset])) {
            return $manifest[$asset];
        }

        return false;
    }

    private static function getManifest()
    {
        if (self::$manifest_cache) {
            return self::$manifest_cache;
        }

        $filePath = Director::getAbsFile(
            trim(self::config()->base_path, '/') . '/' . self::config()->file_name
        );

        if (file_exists($filePath)) {
            $contents = json_decode(file_get_contents($filePath), true);
            self::$manifest_cache = $contents;
            return $contents;
        }

        return false;
    }
}
