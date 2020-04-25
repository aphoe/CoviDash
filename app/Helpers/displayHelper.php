<?php
/**
 * HTML and display helper functions
 */
if(!function_exists('fieldStatus')){
    /**
     * Display Field status
     * @param $status
     * @return bool|string
     */
    function fieldStatus($status){
        $status = strtolower($status);
        $class = null;
        switch($status){
            case 'applied':
            case 'request':
            case 'pending':
            case 'submitted':
                $class = 'info';
                break;
            case 'paused':
            case 'processing':
                $class = 'primary';
                break;
            case 'active':
            case 'success':
            case 'paid':
                $class = 'success';
                break;
            case 'incomplete':
            case 'suspended':
            case 'suspend':
            case 'cancelled':
                $class = 'warning';
                break;
            case 'banned':
            case 'error':
            case 'denied':
            case 'failed':
            case 'declined':
                $class = 'danger';
                break;
            default:
                $class = 'default';
        }

        return '<span class="text-' . $class . '">' . ucwords($status) . '</span>';
    }
}
if(!function_exists('startPageSn')){
    function startPageSn($results){
        $currentPage = $results->currentPage();
        $perPage = $results->perPage();

        $start = ($currentPage - 1) * $perPage;

        return $start + 1;
    }
}
if(!function_exists('pn')){
    function pn(){
        return 'pnotify.custom.min';
    }
}
if(!function_exists('numberSuffix')){
    /**
     * Create an engineering suffix for a number
     * @param $num
     * @param int $round
     * @return \Numbers\SuffixNotation
     */
    function numberSuffix($num, $round=2){
        if($num < 1000){
            return $num;
        }else{
            return \Numbers\Number::n($num)->round($round)->getSuffixNotation();
        }
    }
}
if(!function_exists('str_partial')){
    /**
     * Hide part of a string
     * @param  string $string
     * @param  string $start
     * @param  string $end
     * @param  string $chars
     * @return string
     */
    function str_partial($string, $start='4', $end='3', $chars='*****'){
        $hide = substr($string, $start, -$end);
        return str_replace($hide, $chars, $string);
    }
}
if(!function_exists('statusArray')){
    function statusArray(){
        return [
            'pending' => 'Pending (Just submitted)',
            'processing' => 'Being processed',
            'active' => 'Active',
            'suspended' => 'Suspend',
        ];
    }
}
if(!function_exists('secondsToReadable')){
    /**
     * Converts seconds to a readable format
     * @param string $seconds
     * @param string $format
     * @return false|string
     */
    function secondsToReadable(string $seconds, string $format = 'G\h i\m'){
        return date($format, $seconds);
    }
}
