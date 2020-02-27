var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
    datasets: [{
      label: ' Ventas del mes',
      data: [15000, 20000, 13000, 27000, 32000, 39000],
      backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)'
          ],
      borderColor: [
            '#49B7F3',
            '#49B7F3',
            '#49B7F3',
            '#49B7F3',
            '#49B7F3',
            '#49B7F3'
          ],
      borderWidth: 2
        }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
          }]
    }
  }
});
