<?php

include 'config.php';
include 'helpers.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['add_new_expense_item'])) {
        $amount = clean($_POST['amount']);
        $type = $_POST['amount_type'];
        $category = $_POST['amount_category'];
        $date = $_POST['amount_date'];
        $description = $_POST['amount_description'];

        $table = "amount";

        $data = array(
            'amount' => $amount,
            'type' => $type,
            'category'=> $category,
            'date'=> $date,
            'description'=> $description
        );
        
        if (addData($conn, $table, $data)) {
            header('Location: ../index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    if(isset($_POST['update_expense_item'])) {
        $id = clean($_POST['expense_id']);
        $amount = clean($_POST['amount']);
        $type = clean($_POST['amount_type']);
        $category = clean($_POST['amount_category']);
        $date = clean($_POST['amount_date']);
        $description = clean($_POST['amount_description']);
        $where = "id = '$id'";

        $table = "amount";

        $data = array(
            'amount' => $amount,
            'type' => $type,
            'category'=> $category,
            'date'=> $date,
            'description'=> $description
        );
        
        if (updateData($conn, $table, $data, $where)) {
            header('Location: ../index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }


    if (isset($_POST['delete-expense-item'])) {
        $id = clean($_POST['expense']);
        $table = "amount";
        $where = "id = $id";
        if (deleteData($conn, $table, $where)) {
            header('Location: ../index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    

}
?>