<!doctype html>
<html>

<head>
  <base href="<?php echo base_url();?>">
    <title>Pie Chart with Custom Tooltips</title>
    <script src="assets/chartjs/Chart.bundle.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
    #canvas-holder {
        width: 100%;
        margin-top: 50px;
        text-align: center;
    }
    #chartjs-tooltip {
      opacity: 1;
      position: absolute;
      background: rgba(0, 0, 0, .7);
      color: white;
      border-radius: 3px;
      -webkit-transition: all .1s ease;
      transition: all .1s ease;
      pointer-events: none;
      -webkit-transform: translate(-50%, 0);
      transform: translate(-50%, 0);
    }

    .chartjs-tooltip-key {
      display: inline-block;
      width: 10px;
      height: 10px;
    }
    </style>
</head>

<body>
  
    <div id="canvas-holder" style="width:50%">
        <canvas id="chart-area" width="300" height="300" />
    </div>
    <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <script>
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    10,
                    10,
                    10,
                    10,
                    10,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
            },  ],
            labels: [
                "Red",
                "Green",
                "Yellow",
                "Grey",
                "Dark Grey"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };
    </script>
</body>

</html>
