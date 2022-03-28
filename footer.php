
    <script>
      document.getElementById("remove_filters_button").addEventListener("click", function(){
        window.location.href = "/expense-tracker/index.php";
      });
      if (document.getElementById("cancel-update")){
        document.getElementById("cancel-update").addEventListener("click", function(){
          window.location.href = "/expense-tracker/index.php";
        });
      }

    </script>


    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/chart.js"></script>

  </body>
</html>
<?php
    $query = "SELECT DISTINCT month(date) as available_month from amount GROUP BY month(date) ORDER BY month(date) asc";
    $result = mysqli_query($conn, $query);
    $distinct_month = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>
<script>

  var expense_data = [];
  var income_data = [];

  const months = [<?php 
    foreach($distinct_month as $mth){
        echo "'";
        echo date("F", mktime(null, null, null, $mth["available_month"], 1));
        echo "'";
        echo ',';
    } ?>];

  months.forEach((month, index) => {
    expense_data = [<?php 
    foreach($distinct_month as $mth){
        echo get_total_monthly_amt($conn, $mth['available_month'], 'expense') . ', ';
    } ?>];

   income_data = [<?php 
    foreach($distinct_month as $mth){
        echo get_total_monthly_amt($conn, $mth['available_month'], 'income') . ', ';
    } ?>];
  });

  const chartdisplay = new Chart(document.getElementById("monthlychart"), {
  type: "bar",
  data: {
    labels: months,
    datasets: [
      {
        label: "expense",
        backgroundColor: "#dc3545",
        borderColor: "rgb(0,255,0)",
        data: expense_data,
      },
      {
        label: "income",
        backgroundColor: "#28a745",
        borderColor: "#28a745",
        data: income_data,
      },
    ],
  },

  options: {},
});

</script>