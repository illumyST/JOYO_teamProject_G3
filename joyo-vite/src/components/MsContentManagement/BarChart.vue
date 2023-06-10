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
  props: ["filtered-date"],
  data() {
    return {
      chartDate: [],
      chartData: [],
    };
  },
  mounted() {
    // this.setDefaultChart();
    // this.getDefaultChartData();
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
        .get(`${import.meta.env.VITE_API_URL}/msGetOrderData/getDefaultChartData.php`)
        .then((res) => {
          const jsonData = res.data;
          for (let i = 0; i < jsonData.length; i++) {
            this.chartDate.unshift(jsonData[i].GroupedDate);
            this.chartData.unshift(jsonData[i].TotalPrice);
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    createNewChart() {
      const existingChart = Chart.getChart("myCanvas"); // 获取先前的图表实例
      if (existingChart) {
        existingChart.destroy(); // 销毁先前的图表实例
      }

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
    },
  },
  watch: {
    filteredDate() {
      axios
        .get(`${import.meta.env.VITE_API_URL}/msGetOrderData/getRangedData.php`, {
          params: {
            startDate: this.filteredDate[0],
            endDate: this.filteredDate[1],
          },
        })
        .then((res) => {
          const jsonData = res.data;
          // console.log(jsonData);
          this.chartData = [];
          this.chartDate = [];
          // console.log(jsonData);
          for (let i = 0; i < jsonData.length; i++) {
            this.chartDate.unshift(jsonData[i].GroupedDate);
            this.chartData.unshift(jsonData[i].TotalPrice);
          }
          this.createNewChart();
          // this.setDefaultChart();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style lang="scss" scoped></style>