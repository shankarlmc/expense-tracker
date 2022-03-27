const chartdisplay = new Chart(document.getElementById("monthlychart"), {
  type: "bar",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ],
    datasets: [
      {
        label: "expense",
        backgroundColor: "#dc3545",
        borderColor: "rgb(0,255,0)",
        data: [1, 2, 3, 10, 15],
      },
      {
        label: "income",
        backgroundColor: "#28a745",
        borderColor: "#28a745",
        data: [5, 12, 14, 16, 18],
      },
    ],
  },

  options: {},
});

// console.log(chartdisplay.data.datasets[0].data);
// SELECT DISTINCT month(date) as date from `amount` group by month(date);
const month = [2, 3, 4];
var data = [];
// chartdisplay.data.labels.forEach((element, index) => {
//   data[index] = element;
// });
month.forEach((element, index) => {
  data[element] = index + 10;
});
console.log(data);
