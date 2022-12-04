$(document).ready(function ()
{
    
// fetchbookrequest();
   
    // fetch data form book request without reload
    setInterval(function (){
        $.ajax ({
            type: "GET",
            url: "/fetch-checkpoint",
            dataType: "json",
            success: function (response) 
            {
              //   console.log(response.book_list);
                //jquery foreach
          
                $('#check_point').html("");
                $.each(response.book_list, function (key, list)
                {
                  if (list.groups == "solo")
                  {
                    $('#check_point').append('<tr>\
                    <td>'+list.first_name+' '+ list.last_name+'</th>\
                    <td>'+list.gender+'</td>\
                    <td>'+list.phone+'</td>\
                    <td>'+list.email+'</td>\
                    <td>'+list.address+'</td>\
                    <td>'+list.groups+'</td>\
                    <td>'+list.book_number+'</td>\
                    <td>\
                    </td>\
                    <td>\
                    <a href="/staff/book/delete?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                    <td>\
                    <a href="/staff/book/confirm?id='+list.id+'" class="btn btn-success approve_btn"><i class="far fa-check-circle"></i></a> \
                    </td>\
                  </tr>');
                  } 
                  else 
                  {
                    $('#check_point').append('<tr>\
                    <td>'+list.first_name+' '+ list.last_name+'</th>\
                    <td>'+list.gender+'</td>\
                    <td>'+list.phone+'</td>\
                    <td>'+list.email+'</td>\
                    <td>'+list.address+'</td>\
                    <td>'+list.groups+'</td>\
                    <td>'+list.book_number+'</td>\
                    <td>\
                    <a href="/staff/book/view/all?id='+list.book_number+'" class="btn btn-primary"><i class="far fa-eye"></i></a> \
                    </td>\
                    <td>\
                    <a href="/staff/book/delete?id='+list.id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a> \
                    </td>\
                    <td>\
                    <a href="/staff/book/confirm?id='+list.id+'" class="btn btn-success approve_btn"><i class="far fa-check-circle"></i></a> \
                    </td>\
                  </tr>');

                  }
                   
                });
            }

        });
       
    },2000);

});