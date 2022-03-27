<?php require 'header.php' ?>
    <!-- main section  -->
    <div class="main">
      <!-- main banner section -->
      <div class="top_section bg-dark">
        <h1 class="my-5 text-info">Expense Tracker</h1>
        <h3 class="my-5 text-info">
          Total Budget :
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
        <?php require './amount-form.php'; ?>

        <h2 class="mt-4">Filters</h2>
        <form id="filter_form">
          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="filter_date_from">From</label>
                <input type="date" class="form-control" name="filter_date_from" id="filter_date_from"
                  placeholder="Enter Date" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="filter_date_to">To</label>
                <input type="date" class="form-control" name="filter_date_to" id="filter_date_to"
                  placeholder="Enter Date" />
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="filter_type">Type</label>
                <select class="form-control" name="filter_type" id="filter_type">
                  <option selected disabled></option>

                  <option value="income">Income</option>
                  <option value="expense">Expense</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="filter_category">Category</label>
                <select class="form-control" name="filter_category" id="filter_category">
                  <option selected disabled></option>
                  <option value="food">Food</option>
                  <option value="entertainment">Entertainment</option>
                  <option value="travel">Travel</option>
                  <option value="fees">Fees</option>
                  <option value="job">Job</option>
                  <option value="bonus">Bonus</option>
                  <option value="freelancing">Freelancing</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="filter_search">Search</label>
                <input type="text" class="form-control" name="filter_search" id="filter_search" placeholder="Search" />
              </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12 d-flex pull-right py-1 ">
              <button type="submit" class="btn btn-primary mr-3">Apply Filters</button>
              <button id="remove_filters_button" class="btn btn-danger">Remove Filters</button>
            </div>
          </div>

        </form>

        <!-- Data Display -->
        <table class="table my-5">
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
          <tbody >
          <?php include 'data-table.php' ?>
          </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="edit_model_id" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="edit_item_form">

                  <input type="number" id="edit_amount_id" name="edit_amount_id" hidden>
                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" name="amount" id="amount_form_edit"
                      placeholder="Enter your Amount" required />
                  </div>
                  <div class="form-group">
                    <label for="expense_type">Expense Type</label>
                    <select class="form-control" name="amount_type" id="amount_type_form_edit" required>
                      <option value="income">Income</option>
                      <option value="expense">Expense</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="amount_category">Category</label>
                    <select class="form-control" name="amount_category" id="amount_category_form_edit" required>
                      <option value="food">Food</option>
                      <option value="entertainment">Entertainment</option>
                      <option value="travel">Travel</option>
                      <option value="fees">Fees</option>
                      <option value="job">Job</option>
                      <option value="bonus">Bonus</option>
                      <option value="freelancing">Freelancing</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="amount_date">Date</label>
                    <input type="date" class="form-control" name="amount_date" id="amount_date_form_edit"
                      placeholder="Enter Date" required />
                  </div>

                  <div class="form-group">
                    <label for="amount_description">Description</label>
                    <input type="text" class="form-control" name="amount_description" id="amount_description_form_edit"
                      placeholder="Enter Description" required />
                  </div>
                  <button type="submit" class="btn btn-info">Edit Amount</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <canvas id="monthlychart"></canvas>

      </div>
    </div>

    <?php require 'footer.php' ?>