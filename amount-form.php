<?php

$amount = '';
$type = '';
$category = '';
$date = '';
$description = '';
$id = '';
$btn = '<button type="submit" class="btn btn-primary" name="add_new_expense_item">Add Amount</button>';

if (isset($_GET['expense'])){
    $expense_id = clean($_GET['expense']);
    if ($expense_id != '') {
        $table = "amount";
        $where = "id = '$expense_id'";
        $data = fetchData($conn, $table, $where);
        $data = $data[0];
        if ($data) {
            $id = $data['id'];
            $amount = $data['amount'];
            $type = ucwords($data['type']);
            $category = $data['category'];
            $date = $data['date'];
            $description = $data['description'];
            $btn = '
            <input type="hidden" name="expense_id" value="'.$expense_id.'" />
            <button type="submit" class="btn btn-success" name="update_expense_item">Save Changes</button>
            ';
        }
    }
}

echo '
<form action="./php/submit-form.php" method="POST">
    <div class="row">
    <div class="col-3">
        <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" class="form-control" name="amount" id="amount_form" placeholder="Enter your Amount"
            required value="'.$amount.'" />
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
        <label for="expense_type"> Type</label>
        <select class="form-control" name="amount_type" id="amount_type_form" required>
        ';
        if ($type == "income") {
            echo '
            <option value="income" selected>Income</option>
            <option value="expense">Expense</option>
            ';
        } else {
            echo '
            <option value="income">Income</option>
            <option value="expense" selected>Expense</option>
            ';
        }
        
        echo '
        </select>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
        <label for="amount_category">Category</label>
        <select class="form-control" name="amount_category" id="amount_category_form" required>
            <option value="'.$category.'" selected disabled>'.$category.'</option>
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
    <div class="col-3">
        <div class="form-group">
        <label for="amount_date">Date</label>
        <input type="date" class="form-control" name="amount_date" id="amount_date_form"
            placeholder="Enter Date" required value="'.$date.'" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
        <label for="amount_descriptiom">Description</label>
        <input type="text" class="form-control" name="amount_description" id="amount_description_form"
            placeholder="Enter Description" required value="'.$description.'" />
        </div>
    </div>
    
    <div class="col-12">
        '.$btn.'
    </div>
    </div>
</form>
';
?>