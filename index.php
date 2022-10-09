<?php require 'header.php' ?>
<!-- main section  -->
<div class="main">
  <!-- main banner section -->
  <div class="top_section bg-dark">
    <h1 class="my-5 text-info">Expense Tracker</h1>
    <h3 class="my-5 text-info">
      Remaining Budget :
      <span id="total_banner" class="text-light">Nrs <?php echo total_budget_calculater($conn) ?></span>
    </h3>
    <div class="row" class="my-5">
      <div class="col-6">
        <h5 class="text-danger">
          Total Expense :
          <span id="total_expense" class="text-light">Nrs <?php echo total_budget_calculater($conn, 'expense') ?></span>
        </h5>
      </div>
      <div class="col-6">
        <h5 class="text-info">
          Total Income :
          <span id="total_income" class="text-light">Nrs <?php echo total_budget_calculater($conn, 'income') ?></span>
        </h5>
      </div>
    </div>
  </div>

  <!-- Add Item Form -->
  <div class="container my-4">
    <div id="alerts">

    </div>
    <h3 class="mt-3">Add Amount</h3>
    <?php include './amount-form.php'; ?>

    <h2 class="mt-4">Filters</h2>
    <?php require 'filter-form.php' ?>

    <!-- Data Display -->
    <table class="table my-5" id="expense-details">
      <thead style="background-color: #000;color: #fff;">
        <tr>
          <th>Id</th>
          <th>Description</th>
          <th>Category</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'data-table.php' ?>
      </tbody>
    </table>

    <canvas id="monthlychart"></canvas>

  </div>
</div>

<?php require 'footer.php' ?>