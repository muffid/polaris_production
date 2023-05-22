Highcharts.chart('container', {
    title: {
      text: '',
      align: 'center'
    },
    
    yAxis: {
      title: {
        text: 'Total Order'
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
      name: 'Ecommerce',
      data: [43934, 48656, 73165, 81827, 112143, 142383,
        171533, 165174, 155157, 161454, 154610]
    },{
      name: 'Non Ecommerce',
      data: [4394, 14856, 65165, 85464, 83211, 124233,
        101533, 71651, 100157, 101454, 124610]
    },
    ],
    
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
    
    
    Highcharts.chart('container1', {
    title: {
      text: '',
      align: 'center'
    },
    
    yAxis: {
      title: {
        text: 'Total Order'
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
      name: 'Ecommerce',
      data: [43934, 48656, 73165, 81827, 112143, 142383,
        171533, 165174, 155157, 161454, 154610]
    },{
      name: 'Non Ecommerce',
      data: [4394, 14856, 65165, 85464, 83211, 124233,
        101533, 71651, 100157, 101454, 124610]
    },
    ],
    
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
    