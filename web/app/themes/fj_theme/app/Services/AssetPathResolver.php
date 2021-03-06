<?php
namespace App\Services;

class AssetPathResolver
{
    /**
     * @var string
     */
    private $directory;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $entrypoints;

    /**
     * @var array
     */
    private static $filesMap = [];

    /**
     * @var array
     */
    private $manifest;

    /**
     * @var string
     */
    private static $DEFAULT_DIRECTORY;

    public function __construct($directory = null, $uri = null)
    {
        $this->directory = null !== $directory ? $directory : $this->getDefaultDirectory();
        $this->uri = null !== $uri ? $uri : $this->getDefaultURI();
    }

    /**
     * @return string
     */
    private function getDefaultURI()
    {
        $uriRoot = get_template_directory_uri();

        return \rtrim($uriRoot, \DIRECTORY_SEPARATOR) .
            \DIRECTORY_SEPARATOR .
            'build' .
            \DIRECTORY_SEPARATOR;
    }

    /**
     * @return string
     */
    private function getDefaultDirectory()
    {
        $docRoot = get_template_directory();

        return \rtrim($docRoot, \DIRECTORY_SEPARATOR) .
            \DIRECTORY_SEPARATOR .
            'build';
    }

    /**
     * @return array
     */
    private function getEntrypoints()
    {
        if (null === $this->entrypoints) {
            $file =
                $this->directory . \DIRECTORY_SEPARATOR . 'entrypoints.json';
            $content = \file_get_contents($file);
            if (false === $content) {
                throw new \RuntimeException(
                    \sprintf('Unable to read file "%s"', $file)
                );
            }

            $json = \json_decode($content, true);
            if (\JSON_ERROR_NONE !== \json_last_error()) {
                throw new \RuntimeException(
                    \sprintf('Unable to decode json file "%s"', $file)
                );
            }

            $this->entrypoints = $json['entrypoints'];
        }
        return $this->entrypoints;
    }

    /**
     * @return array
     */
    private function getManifest()
    {
        if (null === $this->manifest) {
            $file = $this->directory . \DIRECTORY_SEPARATOR . 'manifest.json';
            $content = \file_get_contents($file);
            if (false === $content) {
                throw new \RuntimeException(
                    \sprintf('Unable to read file "%s"', $file)
                );
            }

            $json = \json_decode($content, true);
            if (\JSON_ERROR_NONE !== \json_last_error()) {
                throw new \RuntimeException(
                    \sprintf('Unable to decode json file "%s"', $file)
                );
            }

            $this->manifest = $json;
        }

        return $this->manifest;
    }

    /**
     * @param $entrypoint
     * @return array
     */
    public function getWebpackJsFiles($entrypoint)
    {
        if (!\array_key_exists($entrypoint, $this->getEntrypoints())) {
            throw new \InvalidArgumentException(
                \sprintf('Invalid entrypoint "%s"', $entrypoint)
            );
        }

        $files = $this->getEntrypoints()[$entrypoint];
        if (!\array_key_exists('js', $files)) {
            return [];
        }

        return array_map(function($file) {
            return $this->uri . $file;
        }, $files['js']);
    }

    /**
     * @param $entrypoint
     * @return array
     */
    public function getWebpackCssFiles($entrypoint)
    {
        if (!\array_key_exists($entrypoint, $this->getEntrypoints())) {
            throw new \InvalidArgumentException(
                \sprintf('Invalid entrypoint "%s"', $entrypoint)
            );
        }

        $files = $this->getEntrypoints()[$entrypoint];
        if (!\array_key_exists('css', $files)) {
            return [];
        }

        return array_map(function($file) {
            return $this->uri . $file;
        }, $files['css']);
    }

    /**
     * @param $entrypoint
     */
    public function renderWebpackScriptTags($entrypoint)
    {
        $files = $this->getWebpackJsFiles($entrypoint);
        foreach ($files as $file) {
            if (empty(static::$filesMap[$file])) {
                printf('<script src="%s"></script>', $file);
                static::$filesMap[$file] = true;
            }
        }
    }

    /**
     * @param $entrypoint
     */
    public function renderWebpackLinkTags($entrypoint)
    {
        $files = $this->getWebpackCssFiles($entrypoint);
        foreach ($files as $file) {
            if (empty(static::$filesMap[$file])) {
                printf('<link rel="stylesheet" href="%s">', $file);
                static::$filesMap[$file] = true;
            }
        }
    }

    /**
     * @param $resource
     * @return string
     */
    public function getAssetPath($resource)
    {
        $withoutLeadingSlash = \ltrim($resource, '/');
        $withoutLeadingBuild = str_replace("//", "/", 'build/' . $resource);
        $withoutLeadingBuildSlash = str_replace("//", "/", '/build/' . $resource);
        
        $manifest = $this->getManifest();

        if (isset($manifest[$resource])) {
            return $this->uri . $manifest[$resource];
        }
        if (isset($manifest[$withoutLeadingSlash])) {
            return $this->uri . $manifest[$withoutLeadingSlash];
        }
        if (isset($manifest[$withoutLeadingBuild])) {
            return $this->uri . $manifest[$withoutLeadingBuild];
        }
        if (isset($manifest[$withoutLeadingBuildSlash])) {
            return $this->uri . $manifest[$withoutLeadingBuildSlash];
        }
        return $this->uri . $resource;
    }

    public static function encore_entry_js_files($entrypoint, $directory = null)
    {
        return (new self($directory))->getWebpackJsFiles($entrypoint);
    }

    /**
     * @param string $entrypoint
     * @param string|null $directory
     * @return array
     */
    public static function encore_entry_css_files($entrypoint, $directory = null)
    {
        return (new self($directory))->getWebpackCssFiles($entrypoint);
    }

    /**
     * @param string $entrypoint
     * @param string|null $directory
     */
    public static function encore_entry_script_tags($entrypoint, $directory = null)
    {
        (new self($directory))->renderWebpackScriptTags($entrypoint);
    }

    /**
     * @param string $entrypoint
     * @param string|null $directory
     */
    public static function encore_entry_link_tags($entrypoint, $directory = null)
    {
        (new self($directory))->renderWebpackLinkTags($entrypoint);
    }

    /**
     * @param $resource
     * @param string|null $directory
     * @return array|mixed
     */
    public static function asset($resource, $directory = null)
    {
        return (new self($directory))->getAssetPath($resource);
    }
}
