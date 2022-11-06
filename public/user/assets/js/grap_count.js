
$(document).ready(function ()
{  
    
    bar_graph();

    function bar_graph ()
{

    let mon_count;
    let tue_count;
    let wed_count;
    let thu_count;
    let fri_count;
    let sat_count;
    let sun_count;

   
    $.ajax ({
        type: "GET",
        url: "/graph/data",
        dataType: "json",
        success: function (response) 
        {
        //day
          var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
          var day = days[new Date().getDay()];

          console.log(day);
          //time
          const xmas95 = new Date();
          const hours = xmas95.getHours();
      
          console.log(response.visit_count);
            mon_count = response.visit_count.Monday;
            tue_count = response.visit_count.Tuesday;
            wed_count = response.visit_count.Wednesday;
            thu_count = response.visit_count.Thursday;
            fri_count = response.visit_count.Friday;
            sat_count = response.visit_count.Saturday;
            sun_count = response.visit_count.Sunday;

          const labels = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
          const data = {
            labels: labels,
            datasets: [{
              label: 'Total Visit',
              data: [mon_count, tue_count, wed_count, thu_count , fri_count, sat_count, sun_count],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
              borderWidth: 1
            }]
          };
      
          const config = {
            type: 'bar',
            data: data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };
      
          const myChart = new Chart(
          document.getElementById('myChart'),config);  
          
        }

    });
    
}

});

