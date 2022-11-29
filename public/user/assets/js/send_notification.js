$(document).ready(function ()
{   
    messages();
    get_notif();
    view_click();
    user_message();

    function view_click ()
    {
        var view = {
            'view': $('.view_click').val(),
        }

        if (view != null)
        {
            $.ajax({
                type: "GET",
                url: "/view/data",
                data: view,
                dataType: "json",
                success: function (response)
                {
                    if (response.view_data != null)
                    {

                        $('#sender').html("");
                        $('#type').html("");
                        $('#message').html("");
    
                        $('#sender').append(response.view_data.creator_id);
                        $('#type').append(response.view_data.type);
                        $('#message').append(response.view_data.message);
    
                        $('#viewnotif').modal('show');
                    }
                }
            });
        }

    }

    //  user notification
    function user_message ()
    {
        $.ajax ({
            type: "GET",
            url: "/user/notif",
            dataType: "json",
            success: function (response) 
            {
                console.log(response.notification);
                $('#user_notif').html("");

                var count = response.notification.length;

                for(var i = 0; i < count; i++)
                {
                    if (response.notification[i].type == 'normal')
                    {
                        if (response.notification[i].status == "unread")
                        {
                            $('#user_notif').append('<tr class="alert alert-primary">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
                        else
                        {
                            $('#user_notif').append('<tr class="">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
                    }
                    else if (response.notification[i].type == 'alert')
                    {
                        if (response.notification[i].status == "unread")
                        {
                            $('#user_notif').append(' <tr class="alert alert-warning">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
                        else
                        {
                            $('#user_notif').append(' <tr class="">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
                
                    }
                    else if (response.notification[i].type == 'danger')
                    {
                        if (response.notification[i].status == "unread")
                        {
                            $('#user_notif').append(' <tr class="alert alert-danger">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
                        else 
                        {
                            $('#user_notif').append(' <tr class="">\
                            <td data-title="Notification">'+response.notification[i].type+'</th>\
                            <td data-title="From">'+response.notification[i].creator_id+'</td>\
                            <td data-title="Time">'+response.notification[i].time+'</td>\
                            <td data-title="Date">'+response.notification[i].date+'</td>\
                             <td data-title="View">\
                            <a href="/user/view/notification?id='+response.notification[i].id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a> \
                            </td>\
                            <td data-title="Delete">\
                            <a href="/user/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                            </td>\
                            </tr>');
                        }
     
                    }
                }
                
            }

        });
    }

    function messages ()
    {
        $.ajax ({
            type: "GET",
            url: "/notif",
            dataType: "json",
            success: function (response) 
            {
                console.log(response.notification);
                $('#notifications').html("");

                var count = response.notification.length;

                for(var i = 0; i < count; i++)
                {
                    if (response.notification[i].type == 'normal')
                    {
                    $('#notifications').append(' <tr class="alert alert-primary">\
                    <td data-title="">'+response.notification[i].type+'</th>\
                    <td>'+response.notification[i].creator_id+'</td>\
                    <td>'+response.notification[i].time+'</td>\
                    <td>'+response.notification[i].date+'</td>\
                    <td>\
                    <a href="/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                    </tr>');
                    }
                    else if (response.notification[i].type == 'alert')
                    {
                    $('#notifications').append(' <tr class="alert alert-warning">\
                    <td>'+response.notification[i].type+'</th>\
                    <td>'+response.notification[i].creator_id+'</td>\
                    <td>'+response.notification[i].time+'</td>\
                    <td>'+response.notification[i].date+'</td>\
                    <td>\
                    <a href="/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                    </tr>');
                    }
                    else if (response.notification[i].type == 'danger')
                    {
                    $('#notifications').append(' <tr class="alert alert-danger">\
                    <td>'+response.notification[i].type+'</th>\
                    <td>'+response.notification[i].creator_id+'</td>\
                    <td>'+response.notification[i].time+'</td>\
                    <td>'+response.notification[i].date+'</td>\
                    <td>\
                    <a href="/delete/notif?id='+response.notification[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                    </tr>');
                    }
                }

                
            }

        });
    }


    $(document).on('click','.create_notification', function (e)
    {
        e.preventDefault();

        alert("click");

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
                    
                    $('#admin_add_success').html("");
                    $('#admin_add_success').addClass('alert alert-success');
                    $('#admin_add_success').text(response.success);
                    $('#createNotification').find('textarea').val("");
                    $('#createNotification').find('select').val("");
                    $('#err_type').html("");
                    $('#err_message').html("");
                }

                admin_notif();
                messages();
                get_notif();
            }

        });
    });



    function get_notif()
    {
        $.ajax ({
            type: "GET",
            url: "/user/notific",
            dataType: "json",
            success: function (response) 
            {
                console.log(response.get_notif.length);
                $('#notif_count').html("");
                if (response.unread != null){

                    $('#notif_count').addClass('badge bg-primary badge-number');
                    $('#notif_count').append(response.unread.length);
                   
                }


                $('#notif').html("");
                for (let i = 0; i < response.get_notif.data.length; i++)
                {

               
                    if (response.get_notif.data[i].type == 'normal')
                    {
                        if (response.get_notif.data[i].status == "seen")
                        {
                            $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item">\
                            <i class="bi bi-exclamation"></i>\
                            <div>\
                              <h4>'+response.get_notif.data[i].type+'</h4>\
                              <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                              <p>'+response.get_notif.data[i].time+'</p>\
                            </div>\
                            </li> </a>');
                        }
                        else
                        {
                          $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item alert alert-primary">\
                          <i class="bi bi-exclamation"></i>\
                          <div>\
                            <h4>'+response.get_notif.data[i].type+'</h4>\
                            <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                            <p>'+response.get_notif.data[i].message+'</p>\
                            <p>'+response.get_notif.data[i].time+'</p>\
                          </div>\
                          </li> </a>');
                        }
                    }
                    else if (response.get_notif.data[i].type == 'alert')
                    {
                        if (response.get_notif.data[i].status == "seen")
                        {
                            $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item">\
                            <i class="bi bi-exclamation-circle text-warning"></i>\
                            <div>\
                              <h4>'+response.get_notif.data[i].type+'</h4>\
                              <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                              <p>'+response.get_notif.data[i].time+'</p>\
                            </div>\
                            </li> </a>');
                        }
                        else
                        {

                          $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item alert alert-warning">\
                          <i class="bi bi-exclamation-circle text-warning"></i>\
                          <div>\
                            <h4>'+response.get_notif.data[i].type+'</h4>\
                            <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                            <p>'+response.get_notif.data[i].message+'</p>\
                            <p>'+response.get_notif.data[i].time+'</p>\
                          </div>\
                          </li> </a>');
                        }

                    }

                    else if (response.get_notif.data[i].type == 'danger')
                    {
                        if (response.get_notif.data[i].status == "seen")
                        {
                            $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item">\
                            <i class="bi bi-exclamation-triangle-fill"></i>\
                            <div>\
                              <h4>'+response.get_notif.data[i].type+'</h4>\
                              <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                              <p>'+response.get_notif.data[i].time+'</p>\
                            </div>\
                          </li> </a>');
                        }
                        else
                        {
                            $('#notif').append('<a href="/view/notif?id='+response.get_notif.data[i].id+'"><li class="notification-item alert alert-danger">\
                            <i class="bi bi-exclamation-triangle-fill"></i>\
                            <div>\
                              <h4>'+response.get_notif.data[i].type+'</h4>\
                              <p>From: '+response.get_notif.data[i].creator_id+'</p>\
                              <p>'+response.get_notif.data[i].time+'</p>\
                            </div>\
                            </li> </a>');
                        }

                    }

                }
            }

        });
    }
    

});

