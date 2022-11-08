$(document).ready(function ()
{   
    messages();

    function messages ()
    {
        $.ajax ({
            type: "GET",
            url: "/notif",
            dataType: "json",
            success: function (response) 
            {
                $('#notifications').html("");
                $.each(response.notification, function (key, list)
                {
                    $('#notifications').append(' <tr class="alert alert-danger">\
                    <td>'+list.type+'</th>\
                    <td>'+list.message+'</td>\
                    <td>'+list.time+'</td>\
                    <td>'+list.date+'</td>\
                  </tr>')
                });

                
            }

        });
    }

    $(document).on('click','.create_notification', function (e)
    {
        e.preventDefault();

        var data = {
            // yong name ay class 
            'type': $('.type').val(),
            'message': $('.message').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({
            type: "POST",
            url: "/create/notification",
            data: data,
            dataType: "json",
            success: function (response) 
            {
                console.log(response.status);
               
                //get response
                if (response.status == 400)
                {
                    console.log('error');
                    $('#err_type').html("");
                    $('#err_message').html("");

                    $('#err_type').append(response.errors.type);
                    $('#err_message').append(response.errors.message);
          
                }
                else
                {
                    
                    $('#add_success').html("");
                    $('#add_success').addClass('alert alert-success');
                    $('#add_success').text(response.success);
                    $('#createNotification').find('textarea').val("");
                    $('#createNotification').find('select').val("");
                    $('#err_type').html("");
                    $('#err_message').html("");
                }

                messages();

            }

        });
    });

});

