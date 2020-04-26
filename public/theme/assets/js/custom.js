$(document).ready(function(){
    $(function(){
        var current = location.pathname;
        $('.navbar-nav li a').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.parent().addClass('active');
                $this.addClass('active');
                $this.parent().parent().parent('.nav-item').addClass('active');
                $this.parent().parent().parent().children('.nav-link').removeClass('collapsed');
                $this.parent().parent().parent().children('.collapse').addClass('show');

            }
        })
    })
})
