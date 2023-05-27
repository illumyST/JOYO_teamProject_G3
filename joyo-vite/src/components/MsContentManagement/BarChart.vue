<template>
  <div>
    <canvas
      id="myCanvas"
      width="900"
      height="400"
      style="display: block; box-sizing: border-box; height: 441px; width: 100%"
    ></canvas>
  </div>
</template>
<script>
import axios from "axios";
import Chart from "chart.js/auto";
export default {
  data() {
    return {
      chartDate: [
        "2023/3/15",
        "2023/3/16",
        "2023/3/17",
        "2023/3/18",
        "2023/3/19",
        "2023/3/22",
      ],
      chartData: [5000, 8000, 6000, 9000, 7000, 3000],
    };
  },
  created() {
    this.setDefaultChart();
    this.getDefaultChartData();
  },
  mounted() {
    this.getDefaultChartData();
  },
  methods: {
    setDefaultChart() {
      setTimeout(() => {
        const ctx = document.getElementById("myCanvas");
        new Chart(ctx, {
          type: "bar",
          data: {
            labels: this.chartDate,
            datasets: [
              {
                label: "每日業績",
                data: this.chartData,
                borderWidth: 1,
                backgroundColor: ["#afbf30"],
              },
            ],
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
      }, 200);
    },
    getDefaultChartData() {
      axios
        .get("/api/msGetOrderData/getDefaultChartData.php")
        .then((res) => {
          const jsonData = res.data;
          console.log(jsonData);
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>
<style lang="scss" scoped></style>
