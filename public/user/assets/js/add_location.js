$(document).ready(function ()
{   
    map_locations();

    function map_locations ()
    {
        $.ajax ({
            type: "GET",
            url: "/maplocation",
            dataType: "json",
            success: function (response) 
            {
                console.log(response.locations);
                $('#map_locations').html("");
                
                $.each(response.locations, function (key, list)
                {
                    $('#map_locations').append(' <tr>\
                    <td>'+list.name+'</th>\
                    <td>'+list.latitude+'</td>\
                    <td>'+list.longitude+'</td>\
                    <td>'+( list.type == "1" ? 'Check point': 'Pin only')+'</td>\
                    <td class="pr-4 pb-2">\
                    <a href="/admin/delete/location?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                  </tr>')
                });
                
            }

        });
    }

    // pin url
    $(document).on('click','.pin_loc', function (e)
    {
        $('#url').html("");
        if ($('#pin').is(':checked'))
        {
            $('#url').append('<input type="url" name="url" class="url form-control" placeholder="Url">\
            <x-error_style/><span id="err_url"></span></p>');
        }
        else
        {
            $('#url').html(" ");
        }
    });

    // insert location to map
    $(document).on('submit','#addLoc', function (e)
    {
        e.preventDefault();

        var formData = new FormData($('#addLoc')[0]);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({
            type: "POST",
            url: "/addlocation",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) 
            {
                //get response
                if (response.status == 400)
                {
                    $('#err_name').html("");
                    $('#err_latitude').html("");
                    $('#err_longitude').html("");
                    $('#err_img').html("");

                    $('#err_name').append(response.errors.name);
                    $('#err_latitude').append(response.errors.latitude);
                    $('#err_longitude').append(response.errors.longitude);
                    $('#err_img').append(response.errors.img);

          
                }
                else
                {
                    
                    $('#add_success').html("");
                    $('#add_success').addClass('alert alert-success');
                    $('#add_success').text(response.success);
                    $('#addLoc').find('input').val("");
                    $('#err_name').html("");
                    $('#err_latitude').html("");
                    $('#err_longitude').html("");
                    $('#err_img').html("");
                    $('#checkk').html("");
                    $('#checkk').append('<input name="pin" class="pin_loc" id="pin" type="checkbox" value="test">\
                    <label class="form-check-label" for="pin">Pin only</label>')
                    $('#url').html("");
                    setTimeout(function(){
                        $('#add_success').html("");
                        $('#add_success').removeClass('alert alert-success');
                    }, 5000);

                }

                map_locations();

            }

        });
    });

});

