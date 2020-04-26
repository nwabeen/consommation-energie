$.ajax({
    type: "GET",
    url: "js/results.json",
    dataType: "json",
    cache: false
  })
  .fail(function() {})
  .done(function(data) {
    var myData = (data);
    Array.prototype.mapProperty = function(property) {
      return this.map(function(obj) {
        return obj[property];
      });

    };
    lineChartData = {
      labels: myData.mapProperty('annee'),
      datasets: [{
        label: "Dépense",
        backgroundColor: "rgba(213,43,30,0.2)",
        borderColor: "rgba(213,43,30,1)",
        borderWidth: 1,
        data: myData.mapProperty('totalDepense')
      }]
    };
    var ctx = document.getElementById("canvas").getContext("2d");
    var myNewChart = new Chart(ctx, {
      type: "line",
      data: lineChartData,
      responsive: true,
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              max: 10000
            }
          }]
        }
      }
    });
  });
