
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>

<script>
 var expense_data = []
var income_data = []

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

</script>