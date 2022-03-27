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
