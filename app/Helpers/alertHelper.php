<?php
/**
 * Display bootstrap alert
 */

if(!function_exists('htmlAlert')){
    /**
     * displays bootstraps alert box
     * @param $type
     * @param $msg
     * @param bool $dismissable
     * @return bool|html
     */
    function htmlAlert($type, $msg, $dismissable=false){
        switch($type){
            case 'success':
                $icon = 'fas fa-check-circle';
                break;
            case 'info':
                $icon = 'fas fa-info-circle';
                break;
            case 'warning':
                $icon = 'fas fa-exclamation-triangle';
                break;
            case 'danger':
                $icon = 'fas fa-times-circle';
                break;

            default:
                return false;
        }

        ?>
        <div class="alert alert-<?php echo $type;?> <?php if($dismissable){ echo 'alert-dismissible'; }?>" role="alert">
            <?php if($dismissable): ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php endif; ?>
            <i class="<?php echo $icon; ?>"></i>
            <span><?php echo $msg; ?></span>
        </div>
        <?php
    }
}
