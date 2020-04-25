<?php

use App\Artiste;
use App\Episode;
use App\Genre;
use App\Movie;
use App\WatchList;

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
            case 'artiste':
                $eloquent = Artiste::where('slug', $slug);
                break;
            case 'genre':
                $eloquent = Genre::where('slug', $slug);
                break;
            case 'video':
            case 'movie':
                $eloquent = Movie::where('slug', $slug);
                break;
            case 'episode':
                $eloquent = Episode::where('slug', $slug);
                break;
            case 'watch-list':
            case 'watchList':
                $eloquent = WatchList::where('slug', $slug);
                break;

            default:
                abort(404);
        }
        $sn = 1;
        while($eloquent->count() > 0){
            $whileSlug = $slug . '-' . $sn++;

            switch($table) {
                case 'artiste':
                    $eloquent = Artiste::where('slug', $whileSlug);
                    break;
                case 'genre':
                    $eloquent = Genre::where('slug', $whileSlug);
                    break;
                case 'video':
                case 'movie':
                    $eloquent = Movie::where('slug', $whileSlug);
                    break;
                case 'episode':
                    $eloquent = Episode::where('slug', $whileSlug);
                    break;
                case 'watch-list':
                case 'watchList':
                    $eloquent = WatchList::where('slug', $whileSlug);
                    break;

                default:
                    abort(404);
            }
        }

        return $whileSlug;
    }
}
