<?php

use App\Profile;
use App\User;
use App\WatchList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

if(!function_exists('userPhoto')){
    /**
     * Get url of a user's profile photo
     * @param string $image
     * @param string $size
     * @return string
     */
    function userPhoto(string $image, string $size='avatar'): string{
        return asset('users/photo/'. $size . '/' . $image);
    }
}
if(!function_exists('userPhotoName')){
    /**
     * Compose a user profile photo name
     * @param User $user
     * @param $ext
     * @return string
     */
    function userPhotoName(User $user, $ext){
        return 'img-' . \Hashids::encode($user->id) . '-' . date('U') . '.' . $ext;
    }
}
if(!function_exists('userPhotoUrl')){
    /**
     * Get url of user's photo
     * @param Profile $profile
     * @param string $size
     * @return string|null
     */
    function userPhotoUrl(Profile $profile, string $size='avatar'){
        if(!in_array($size, ['large', 'avatar'])){
            return null;
        }
        return asset(config('project.userPhoto') . '/' . $size . '/' .  $profile->photo);
    }
}
if(!function_exists('userOne')){
    /**
     * Return details of User One
     * @return User
     */
    function userOne(): User{
        $id = env('USER_ONE_ID', 1);
        return User::whereId($id)->first();
    }
}
if(!function_exists('isUserOne')){
    /**
     * Check if a user is User One
     * @param User $user
     * @return bool
     */
    function isUserOne(User $user): bool{
        $userOne = userOne();
        if($user->id == $userOne->id){
            return true;
        }else{
            return false;
        }
    }
}
if(!function_exists('watchListsVideos')){
    /**
     * Get all the watch lists and respective videos of a user
     * @param null $user
     * @return array|Builder[]|Collection
     */
    function watchListsVideos($user=null){
        if($user === null){
            return [];
        }

        $lists = WatchList::with(['videos.video'])
            ->where('user_id', $user->id)
            ->get();

        return $lists;
    }
}
