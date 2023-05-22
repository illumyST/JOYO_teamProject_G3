<template>
  <div>
    <canvas id="myCanvas"></canvas>
  </div>
</template>
<script>
// import Chart from "chart.js/auto";
export default {
  mounted() {
    const ctx = document.getElementById("myCanvas");

    console.log("mounted");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [
          {
            label: "# of Votes",
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1,
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
    ctx;
  },
};
</script>
<style lang="scss" scoped></style>
