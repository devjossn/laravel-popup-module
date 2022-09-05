require('./bootstrap');

$(document).ready(function () {
    $('body').on('click', '#popupModal-button', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            dataType: 'html',
            success: function(response) {
                $('#popupModal').remove();
                $('body').append(response);
                $('#popupModal').modal('show');
            },
            error: function (data){
                    console.log(data);
            }
        });

        
    });
});
