<?php
if(!function_exists('themeCss')){
    /**
     * Get theme's theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function themeCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('themeJs')){
    /**
     * Get theme's theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function themeJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('themeSectionCss')){
    /**
     * Get theme's theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function themeSectionCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/section/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/section/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('themeSectionJs')){
    /**
     * Get theme's theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function themeSectionJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/section/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/section/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('themeCssUrl')){
    /**
     * Get the URL of a theme theme's CSS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function themeCssUrl($url, $ext='css'){
        return asset('theme/assets/css/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeJsUrl')){
    /**
     * Get the URL of a theme theme's JS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function themeJsUrl($url, $ext='js'){
        return asset('theme/assets/js/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeImageUrl')){
    /**
     * Get the URL of a theme theme's image file
     * @param $image
     * @return string
     */
    function themeImageUrl($image){
        return asset('theme/assets/img/' . $image);
    }
}
if(!function_exists('themeFolderFileUrl')){
    /**
     * Get the URL of a file in one of the theme assets folders
     * @param string $file
     * @return string
     */
    function themeFolderFileUrl(string $file): string{
        return asset('theme/assets/' . $file);
    }
}
if(!function_exists('themeVendorCss')){
    /**
     * HTML tag for CSS in theme Vendor folder
     * @param $css
     * @return string
     */
    function themeVendorCss($css): string{
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/vendor/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/vendor/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}
if(!function_exists('themeVendorJs')){
    /**
     * HTML tag for JS in theme Vendor folder
     * @param $js
     * @return string
     */
    function themeVendorJs($js): string{
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/vendor/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/vendor/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}
if(!function_exists('themeVendorCssUrl')){
    /**
     * URL of CSS in theme's Vendor folder
     * @param string $url
     * @param string $ext
     * @return string
     */
    function themeVendorCssUrl(string $url, string $ext='css'): string{
        return asset('theme/assets/vendor/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeVendorJsUrl')){
    /**
     * URL of JS in theme's Vendor folder
     * @param string $url
     * @param string $ext
     * @return string
     */
    function themeVendorJsUrl(string $url, string $ext='js'): string {
        return asset('theme/assets/vendor/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeVendorFileUrl')){
    /**
     * URL of a file in theme's Vendor folder
     * @param string $file
     * @return string
     */
    function themeVendorFileUrl(string $file): string {
        return asset('theme/assets/vendor/' . $file);
    }
}
if(!function_exists('breadcrumbs')){
    /**
     * Generate breadcrumbs HTM tags
     * @param $crumbs
     * @return string
     */
    function breadcrumbs($crumbs): string {
        if(!is_array($crumbs)){
            return '';
        }

        $bread = '<li class="breadcrumb-item"><a href="' . url('/') . '">Home</a></li>'  . "\r\n";
        foreach ($crumbs as $key=>$val){
            if($key != 'active'){
                $bread .= '<li class="breadcrumb-item"><a href="' . url($key) . '">' . ucwords($val) . '</a></li>' . "\r\n";
            }else{
                $bread .= '<li class="breadcrumb-item active" aria-current="page">' . ucwords($val) . '</li>' . "\r\n";
            }
        }

        return $bread;
    }
}

