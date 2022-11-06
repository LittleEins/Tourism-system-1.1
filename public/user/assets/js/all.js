
$(document).ready(function ()
{  
    
    dashboard();
    book_count();

    function dashboard ()
    {

        $.ajax ({
            type: "GET",
            url: "/user/dashboard/fetch",
            dataType: "json",
            success: function (response) 
            {

                $('#falls_count').html("");
                $('#falls_count').append('<p class="mb-2">Bolinao Falls</p>\
                <h6 class="mb-0">'+response.falls+'</h6>');

                $('#tundol_count').html("");
                $('#tundol_count').append('<p class="mb-2">Tundol</p>\
                <h6 class="mb-0">'+response.tundol+'</h6>');

            }
 
        });
    }

    function book_count ()
    {

        $.ajax ({
            type: "GET",
            url: "/book2/count",
            dataType: "json",
            success: function (response) 
            {
                $('#locations').html(" ");
                $('#locations').append('<option value="">Destination</option>\
                <option value="falls">Falls ('+response.falls+')</option>\
                <option value="light house">Light House ('+response.tundol+')</option>\
                <option value="tupa">Tupa ('+response.falls+')</option>\
                <option value="patar">Patar ('+response.tundol+')</option>');

            }
 
        });
    }  


});
