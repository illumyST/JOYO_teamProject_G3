<template>
  <div>
    <canvas id="myCanvas" width="900" height="400" style="display: block;box-sizing: border-box;height: 441px;width: 100%;"></canvas>
  </div>
</template>
<script>
import Chart from "chart.js/auto";
export default {
  mounted() {
    const ctx = document.getElementById("myCanvas");

    console.log("mounted");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["2023/3/15", "2023/3/16", "2023/3/17", "2023/3/18", "2023/3/19", "2023/3/20"],
        datasets: [
          {
            label: "每日業績",
            data: [5000, 8000, 6000, 9000, 7000, 3000],
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
};
</script>
<style lang="scss" scoped></style>
