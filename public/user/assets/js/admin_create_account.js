$(document).ready(function ()
{   
    fetch_accounts_locations();
    fetch_link();

    function fetch_link ()
    {
        $.ajax ({
            type: "GET",
            url: "/list/location/link",
            dataType: "json",
            success: function (response) 
            {
                console.log(response.list)
                $('#admin_type').html("");
                $('#admin_type').append('<option value="">Location Link</option>');
                $.each(response.list, function (key, lists)
                {
                    $('#admin_type').append('<option value="'+lists.name+'">'+lists.name+'</option>')
                });

            }

        });
    }

    function fetch_accounts_locations ()
    {
        $.ajax ({
            type: "GET",
            url: "/admin/fetch/account",
            dataType: "json",
            success: function (response) 
            {
                $('#admin_accounts').html("");
                console.log(response.accounts)
                $.each(response.accounts, function (key, list)
                {
                    $('#admin_accounts').append(' <tr>\
                    <td>'+list.first_name+' '+list.last_name+'</th>\
                    <td>'+list.email+'</td>\
                    <td>'+list.location+'</td>\
                    <td class="pr-4 pb-2">\
                    <a href="/edit/pass/account?id='+list.id+'" class="btn btn-primary"><i class="fa fa-edit"></i></a> \
                    </td>\
                    <td class="pr-4 pb-2">\
                    <a href="/delete/account?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                  </tr>')
                });

            }

        });
    }

    $(document).on('click','.create_account', function (e)
    {
        e.preventDefault();

        var data = {
            'admin_type': $('.admin_type').val(),
            'admin_password': $('.admin_password').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({
            type: "POST",
            url: "/create/stuff/account",
            data: data,
            dataType: "json",
            success: function (response) 
            {
                console.log(response.success);
                //get response
                if (response.status == 400)
                {
                    console.log('error');
                    $('#admin_err_location').html("");
                    $('#admin_err_password').html("");

                    $('#admin_err_location').append(response.errors.admin_type);
                    $('#admin_err_password').append(response.errors.admin_password);

                }
                else
                {
                    
                    $('#admin_add_success').html("");
                    $('#admin_add_success').addClass('alert alert-success');
                    $('#admin_add_success').text(response.success);
                    $('#create_stuff').find('input').val("");
                    $('#create_stuff').find('select').val("");
                    $('#admin_err_location').html("");
                    $('#admin_err_password').html("");

                    fetch_link();
                    fetch_accounts_locations();
                }

            }

        });
    });

});

