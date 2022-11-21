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
                    <a href="/delete/location?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                  </tr>')
                });
                
            }

        });
    }

    $(document).on('click','.add_location', function (e)
    {
        e.preventDefault();

        var data = {
            'name': $('.name').val(),
            'latitude': $('.latitude').val(),
            'longitude': $('.longitude').val(),
            'pin_type': $('#flexCheckDefault').is(':checked'),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({
            type: "POST",
            url: "/addlocation",
            data: data,
            dataType: "json",
            success: function (response) 
            {
               
                //get response
                if (response.status == 400)
                {
                    console.log('error');
                    $('#err_name').html("");
                    $('#err_latitude').html("");
                    $('#err_longitude').html("");

                    $('#err_name').append(response.errors.name);
                    $('#err_latitude').append(response.errors.latitude);
                    $('#err_longitude').append(response.errors.longitude);

          
                }
                else
                {
                    
                    $('#add_success').html("");
                    $('#add_success').addClass('alert alert-success');
                    $('#add_success').text(response.success);
                    $('#addlocationModal').find('input').val("");
                    $('#err_name').html("");
                    $('#err_latitude').html("");
                    $('#err_longitude').html("");
                }

                map_locations();

            }

        });
    });

});

