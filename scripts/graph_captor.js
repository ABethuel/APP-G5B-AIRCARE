// Script js permettant d'afficher un graph déterminant la qualité de l'air en fonction du temps

$(document).ready(function(){

    $.ajax({
        url: './captors/jsonGraph.php',
        type: 'GET',
        success: function(response) {
            console.log(response);
            console.log(response[0].result)
            
            var airQuality = {
                results: [],
                dates: [],
            };

            var length = response.length;
            
            for (var i = 0; i < length; i++) {
                airQuality.results.push(response[i].result);
                airQuality.dates.push(response[i].date)
            }

            var ctx = document.getElementById("airChart");

            var airChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: airQuality.dates,
                    datasets: [
                    { 
                        label: 'test',
                        data: airQuality.results, 
                        borderColor: "#2254B5",
                        backgroundColor: 'rgba(34, 84, 181, 0.25)'
                    }
                  ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                           label: function(tooltipItem) {
                                  return tooltipItem.yLabel;
                           }
                        }
                    }
                }
              });
        },
        error: function(response) {
            console.log(response);
        },
    })

});


