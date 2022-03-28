<?php

$date_from = '';
$date_to = '';
$type = '';
$category = '';
$max_date = date("Y-m-d");

$description = '';

isset($_GET['date-from']) || isset($_GET['date-to']) || isset($_GET['type']) || isset($_GET['category']) || isset($_GET['search']) ? $filter = true : $filter = false;


if ($filter){
    
    if (isset($_GET['date-from'])){
        $date_from = clean($_GET['date-from']);
    }

    if (isset($_GET['date-to'])){
        $date_to = clean($_GET['date-to']);
    }

    if (isset($_GET['type'])){
        $type = clean($_GET['type']);
    }

    if (isset($_GET['category'])){
        $category = clean($_GET['category']);
    }

    if (isset($_GET['search'])){
        $search = clean($_GET['search']);
    }

    $table = "amount";

    
}

echo '
    <form id="filter_form" method="GET" action="/expense-tracker/index.php?">
        <div class="row">
        <div class="col-3">
            <div class="form-group">
            <label for="filter_date_from">From</label>
            <input type="date" class="form-control" value="'.$date_from.'" name="date-from" id="filter_date_from"
                placeholder="Enter Date" />
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
            <label for="filter_date_to">To</label>
            <input type="date" class="form-control" value="'.$date_to.'" name="date-to" id="filter_date_to"
                placeholder="Enter Date" />
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
            <label for="filter_type">Type</label>
            <select class="form-control" name="type" id="filter_type">
                <option selected disabled value="'.$type.'">'.ucwords($type).'</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
            <label for="filter_category">Category</label>
            <select class="form-control" name="category" id="filter_category">
                <option selected disabled value="'.$category.'">'.ucwords($category).'</option>
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
            <input type="text" class="form-control" value="'.$search.'" name="search" id="filter_search" placeholder="Search" />
            </div>
        </div>
        <div class="col-4 col-md-12 col-sm-12 d-flex pull-right py-1 ">
            <button type="submit" class="btn btn-primary mr-3">Apply Filters</button>
            <button id="remove_filters_button" type="button" class="btn btn-danger">Remove Filters</button>
        </div>
        </div>
    </form>
';
?>