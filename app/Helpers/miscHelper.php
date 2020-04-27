<?php

use App\Province;

if(!function_exists('uniqueSlug')){
    /**
     * Get a unique slug for a model
     * @param string $name
     * @param string $table
     * @return string
     */
    function uniqueSlug(string $name, string $table): string{
        $slug = str_slug($name);
        $whileSlug = $slug;
        switch($table) {
            case 'province':
                $eloquent = Province::where('slug', $slug);
                break;

            default:
                abort(404);
        }
        $sn = 1;
        while($eloquent->count() > 0){
            $whileSlug = $slug . '-' . $sn++;

            switch($table) {
                case 'province':
                    $eloquent = Province::where('slug', $whileSlug);
                    break;

                default:
                    abort(404);
            }
        }

        return $whileSlug;
    }
}
