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
                $('#sup_map_locations').html("");
                
                $.each(response.locations, function (key, list)
                {
                    $('#sup_map_locations').append(' <tr>\
                    <td>'+list.name+'</th>\
                    <td>'+list.latitude+'</td>\
                    <td>'+list.longitude+'</td>\
                    <td>'+( list.type == "1" ? 'Check point': 'Pin only')+'</td>\
                    <td class="pr-4 pb-2">\
                    <a href="/supAdmin/delete/location?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                  </tr>')
                });
                
            }

        });
    }

    $(document).on('click','.sup_add_location', function (e)
    {
        e.preventDefault();

        var data = {
            'name': $('.sup_name').val(),
            'latitude': $('.sup_latitude').val(),
            'longitude': $('.sup_longitude').val(),
            'pin_type': $('#flexCheckDefault').is(':checked'),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({
            type: "POST",
            url: "/supAdmin/addlocation",
            data: data,
            dataType: "json",
            success: function (response) 
            {
               
                //get response
                if (response.status == 400)
                {
                    $('#sup_err_name').html("");
                    $('#sup_err_latitude').html("");
                    $('#sup_err_longitude').html("");

                    $('#sup_err_name').append(response.errors.name);
                    $('#sup_err_latitude').append(response.errors.latitude);
                    $('#sup_err_longitude').append(response.errors.longitude);

          
                }
                else
                {
                    
                    $('#add_success').html("");
                    $('#add_success').addClass('alert alert-success');
                    $('#add_success').text(response.success);
                    $('#supadminaddlocationModal').find('input').val("");
                    $('#sup_err_name').html("");
                    $('#sup_err_latitude').html("");
                    $('#sup_err_longitude').html("");
                }

                map_locations();

            }

        });
    });

});

