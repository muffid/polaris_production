Highcharts.chart('container', {

    title: {
      text: 'Performa Penjualan Non Ecommerce',
      align: 'left'
    },
  
    subtitle: {
      text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>',
      align: 'left'
    },
  
    yAxis: {
      title: {
        text: 'Number of Employees'
      }
    },
  
    xAxis: {
      accessibility: {
        rangeDescription: 'Range: 2010 to 2020'
      }
    },
  
 
  
    plotOptions: {
      series: {
        label: {
          connectorAllowed: false
        },
        pointStart: 2010
      }
    },
  
    series: [{
      name: 'Installation & Developers',
      data: [43934, 48656, 65165, 81827, 112143, 142383,
        171533, 165174, 155157, 161454, 154610]
    }, {
      name: 'Manufacturing',
      data: [24916, 37941, 29742, 29851, 32490, 30282,
        38121, 36885, 33726, 34243, 31050]
    }],
  
    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }
  
  });