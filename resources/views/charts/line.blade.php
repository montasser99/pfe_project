
<script type="text/javascript" src="{{ asset('assets/js/Utils.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
<body>
<canvas id="myChart"></canvas>
 </body>
<script>
const inputs = {
  min: 7,
  max: 19,
  count: 8,
  decimals: 2,
  continuity: 1
};
tab=[];
tab.push('{{ $AVG_Entrer_Matin  }}');
tab.push('{{ $AVG_Entrer_Matin  }}');
tab.push('{{ $AVG_Sortie_Matin  }}');
tab.push('{{ $AVG_Sortie_Matin  }}');
tab.push('{{ $AVG_Entrer_Midi  }}');
tab.push('{{ $AVG_Entrer_Midi  }}');
tab.push('{{ $AVG_Sortie_Midi  }}');
tab.push('{{ $AVG_Sortie_Midi  }}');
console.log(tab);

/*'AVG_Entrer_Matin'=>$AVG_Entrer_Matin,
            'AVG_Sortie_Matin'=>$AVG_Sortie_Matin,
            'AVG_Entrer_Midi'=>$AVG_Entrer_Midi,
            'AVG_Sortie_Midi'=>$AVG_Sortie_Midi
*/

const generateLabels = () => {
  return Samples.utils.months({count: inputs.count});
};

const generateData = () => (Samples.utils.numbers(inputs));
console.log(generateData());
Samples.utils.srand(42);
const data = {
  labels: tab,
  datasets: [
    {
      label: 'AVG matin entre',
      data: tab,
      borderColor: window.chartColors.red,
      backgroundColor: Samples.utils.transparentize(window.chartColors.red),

    },
    {
      label: 'AVG matin sortie',
      data: tab,
      borderColor: window.chartColors.green,
      backgroundColor: Samples.utils.transparentize(window.chartColors.green),

    },
        {
      label: 'AVG soir entre',
      data: tab,
      borderColor: window.chartColors.orange,
      backgroundColor: Samples.utils.transparentize(window.chartColors.orange),

    },
    {
      label: 'AVG soir sortie',
      data: tab,
      borderColor: window.chartColors.yellow,
      backgroundColor: Samples.utils.transparentize(window.chartColors.yellow),

    },

  ]
};
const config = {
  type: 'line',
  data: data,
  options: {
    scales: {
      y: {
        stacked: true
      }
    },
    plugins: {
      filler: {
        propagate: false
      },
      'samples-filler-analyser': {
        target: 'chart-analyser'
      }
    },
    interaction: {
      intersect: false,
    },
  },
};
let smooth = false;
let propagate = false;

const actions = [
  {
    name: 'Randomize',
    handler(chart) {
      chart.data.datasets.forEach(dataset => {
        dataset.data = generateData();
      });
      chart.update();
    }
  },
  {
    name: 'Propagate',
    handler(chart) {
      propagate = !propagate;
      chart.options.plugins.filler.propagate = propagate;
      chart.update();
    }
  },
  {
    name: 'Smooth',
    handler(chart) {
      smooth = !smooth;
      chart.options.elements.line.tension = smooth ? 0.4 : 0;
      chart.update();
    }
  }
];
 var myChart = new Chart( document.getElementById('myChart'), config, data, actions,inputs );
</script>
