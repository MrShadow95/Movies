// Adding  movies
$(document).ready(function () {
    $('#thumbnail').on('change', function () {
        $('#featured-img').nextAll('img').remove();
        let thumb_link = $('#thumbnail').get(0).files[0];

        if(thumb_link){
            var reader = new FileReader();
 
            reader.onload = function () {
                $('<img class="img-thumbnail mb-2" src=' + reader.result + ' width="20%">').insertAfter('#featured-img');
            }
 
            reader.readAsDataURL(thumb_link);
        }
    });

    // $('#submit-movie').on('click', function () {
    //     var form = $('#form');
    //     console.log(form);
    //     $.ajax({
    //         url: '../admin/upload.php',
    //         type: 'POST',
    //         data : new FormData(form),
    //         success: function (res) {
    //             if (res == 'ok') {
    //                 $('#statusmsg').html("<span class='alert alert-success'>Upload successfull.</span>");
    //             }
    //             else
    //                 $('#statusmsg').html("<span class='alert alert-danger'>Upload unsuccessfull.</span>");
    //         }
    //     })
    // })
});