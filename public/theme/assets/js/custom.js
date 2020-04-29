$(document).ready(function(){
    $(function(){
        var current = location.pathname;
        console.log(current);
        $('.navbar-nav li a').each(function(){
            var $this = $(this);
            var href = $this.attr('href');
            var last = href.substring(href.length - current.length);
            console.log(href, last);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1 && last === current){
                $this.addClass('active');
                $this.parent('.nav-item').addClass('active');
                $this.parent().parent().parent('.nav-item').addClass('active');
                $this.parent().parent().parent().children('.nav-link').removeClass('collapsed');
                $this.parent().parent().parent().children('.collapse').addClass('show');

            }
        })
    })
})
