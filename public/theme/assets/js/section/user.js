$(document).ready(function () {
    $('.admin-block-user').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        var ctrl = $(this);
        var i = ctrl.children("i");
        var iCur = i.attr('class');
        var span = ctrl.children("span");
        var disp = $('#active-' + id );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Loading
        i.removeClass().addClass('fas fa-spin fa-spinner');

        $.ajax({
            url: blockUrl,
            type: "get",
            data: {
                id: id,
                action: action
            },
            error: function(data){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    title: 'Error!',
                    text: 'Activation error: ' + data.statusText,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                });
                i.removeClass().addClass(iCur);
            },
            success: function(html){
                console.log(html);
                if(html == 1){
                    span.html('Unblock');
                    ctrl.attr('data-action', 'unblock');
                    disp.html("Yes");
                    i.removeClass().addClass('fas fa-check');
                }else if(html == 2){
                    span.html('Block');
                    ctrl.attr('data-action', 'block');
                    disp.html("No");
                    i.removeClass().addClass('fas fa-ban');
                }else{
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        title: null,
                        text: html,
                        icon: 'info',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                    });
                    i.removeClass().addClass(iCur);
                }
            }
        });
    });
});
