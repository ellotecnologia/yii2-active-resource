<?php namespace Zaioll\ActiveResource;

use Zaioll\ActiveResource\Model;

class UrlHelper
{
    /**
     * Get url to collection or element of resource
     * with check base url trailing slash
     * @param string $type api|collection|element
     * @param string $id
     * @return string
     */
    public static function getUrl($modelClass, $type = 'base', $id = 'null')
    {
        if ($type == 'api' && ! method_exists($modelClass, 'getResourceName')) {
        //if ($type == 'api' && ! ($modelClass instanceof Model)) {
            return '';
        }
        $collection = $modelClass::getResourceName();

        switch ($type) {
            case 'api':
                return self::trailingSlash($modelClass::getApiUrl());
                break;
            case 'collection':
                return self::trailingSlash($collection, false);
                break;
            case 'element':
                return self::trailingSlash($collection) . self::trailingSlash($id, false);
                break;
        }

        return '';
    }

    /**
     * Check trailing slash
     * if $add - add trailing slash
     * if not $add - remove trailing slash
     * @param $string
     * @param bool $add
     * @return string
     */
    public static function trailingSlash($string, $add = true)
    {
        return substr($string, -1) === '/'
            ? ($add ? $string : substr($string, 0, strlen($string) - 1))
            : ($add ? $string . '/' : $string);
    }

}
