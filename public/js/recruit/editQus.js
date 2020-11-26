$(document).ready(function () {
    $(function () {
        $('input').bind('input propertychange', function () {
            var currentName = $(this).attr('id')
            var btnIdName = null
            if (currentName.substr(0, 3) == 'sel') {
                var key = currentName.substr(3, 1)
                btnIdName = '#btn-sel' + key
            } else {
                btnIdName = '#btn-' + currentName
            }
            
            console.log($(btnIdName).attr('class'))
            $(btnIdName).removeClass('btn-dark')
            $(btnIdName).addClass('btn-primary')
            $(btnIdName).removeAttr('disabled')
            console.log($(btnIdName).attr('class'))
        });
    })
});
