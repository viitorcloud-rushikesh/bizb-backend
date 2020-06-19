<?php

use App\Models\UserMeta;

if (!function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     * @since 2020-06-09
     *
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @author Jaynil Parekh
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory . $filename)) {
                array_push($directory_list, $directory . $filename . '/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory . '*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (!function_exists('loggedInUser')) {

    /**
     * @return mixed
     * @since 2020-06-09
     *
     * Getting logged in user
     * @author Jaynil Parekh
     */
    function loggedInUser()
    {
        return \Auth::user();
    }
}

if (!function_exists('getUserMetaValue')) {

    /**
     * @param null $userId
     * @param null $key
     * @return mixed
     * @since 2020-06-09
     *
     * Getting User meta values by meta key
     *
     * @author Jaynil Parekh
     */
    function getUserMetaValue($userId = null, $key = null)
    {
        if (!empty($userId) && !empty($key)) {
            return UserMeta::where('user_id', $userId)->where('meta_key', $key)->pluck('meta_value')->first();
        }
    }
}

if (!function_exists('addUserSingleMetaValue')) {

    /**
     * @param null $userId
     * @param null $key
     * @param null $value
     * @return bool
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Store single user meta key and value
     *
     */
    function addUserSingleMetaValue($userId = null, $key = null, $value = null)
    {
        if (!empty($userId) && !empty($key) && !empty($value)) {
            $data['user_id'] = $userId;
            $data['meta_key'] = $key;
            $data['meta_value'] = $value;

            if (UserMeta::create($data)) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}

if (!function_exists('addUserMultipleMetaValue')) {

    /**
     * @param null $data
     * @return bool
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     *
     * Store multiple user meta keys and values
     *
     */
    function addUserMultipleMetaValue($data = null)
    {
        if (!empty($data)) {

            if (UserMeta::insert($data)) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}

if (!function_exists('updateUserMetaValue')) {

    /**
     * @param null $userId
     * @param null $key
     * @param null $value
     * @return bool
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Update user meta value
     *
     */
    function updateUserMetaValue($userId = null, $key = null, $value = null)
    {
        if (!empty($userId) && !empty($key) && !empty($value)) {
            UserMeta::where('user_id', $userId)->where('meta_key', $key)->update(['meta_value' => $value]);
            return true;
        }
    }
}

if (!function_exists('removeUserMetaValue')) {

    /**
     * @param null $userId
     * @param null $key
     * @param null $value
     * @return bool
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Update user meta value
     *
     */
    function removeUserMetaValue($userId = null, $key = null, $value = null)
    {
        if (!empty($userId) && !empty($key)) {
            UserMeta::where('user_id', $userId)->where('meta_key', $key)->delete();
            return true;
        }
    }
}

if (!function_exists('generateConfirmationCode')) {

    /**
     * @param int $length
     * @return false|string
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Generate confirmation code
     *
     */
    function generateConfirmationCode($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}

if (!function_exists('generateOtp')) {

    /**
     * @param int $length
     * @return false|string
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Generate confirmation code
     *
     */
    function generateOtp($length = 6)
    {
        $pool = '0123456789';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}

if (!function_exists('generateUsername')) {

    /**
     * @param $string
     * @return string
     * @author Jaynil Parekh
     * @since 2020-06-19
     *
     * Generate username
     *
     */
    function generateUsername($string)
    {
        $pattern = " ";
        $firstPart = substr(strstr(strtolower($string), $pattern, true), 0, 2);
        $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 3);
        $nrRand = rand(0, 100);

        return trim($firstPart) . trim($secondPart) . trim($nrRand);
    }
}
