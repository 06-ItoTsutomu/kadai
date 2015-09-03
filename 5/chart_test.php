<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<style>
input{
  display:block;
}
</style>
</head>
<body>

<h1>Chart.jsテスト</h1>

<canvas id="myChart" width="400" height="400"></canvas>

<script>
var data = {
  labels: ["January", "February", "March", "April", "May", "June", "July"],
  datasets: [
    {
      label: "My First dataset",
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: [65, 59, 80, 81, 56, 55, 70]
    },
    {
      label: "My Second dataset",
      fillColor: "rgba(151,187,205,0.2)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(151,187,205,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(151,187,205,1)",
      data: [28, 48, 40, 19, 86, 27, 90]
    },
    {
      label: "My aaaa dataset",
      fillColor: "rgba(151,187,205,0.2)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(50,187,205,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#0ff",
      pointHighlightStroke: "rgba(151,187,205,1)",
      data: [60, 48, 20, 19, 86, 27, 20]
    }
  ]
};

// コンテキストを作成
var ctx = document.getElementById("myChart").getContext("2d");
// コンテキストを引数にして、Lineメソッドを実行（線グラフ表示時）
var myNewChart = new Chart(ctx).Line(data);

</script>
</body>
</html>