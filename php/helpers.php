<?php

function addData($conn, $table, $data) {
    $sql = "INSERT INTO $table (";
    $sql .= implode(", ", array_keys($data));
    $sql .= ") VALUES ('";
    $sql .= implode("', '", array_values($data));
    $sql .= "')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($conn);
        exit;
    }
}

function fetchData($conn, $table, $where = NULL){
    if ($where){
        $sql = "SELECT * FROM $table WHERE $where";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function updateData($conn, $table, $data, $where) {
    $sql = "UPDATE $table SET ";
    $set = array();
    foreach ($data as $key => $value) {
        $set[] = "$key = '$value'";
    }
    $sql .= implode(", ", $set);
    $sql .= " WHERE $where";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($conn);
        exit;
    }
}

function deleteData($conn, $table, $where) {
    $sql = "DELETE FROM $table WHERE $where";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
// prevent xss from input values 
function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function total_budget_calculater($conn, $type =  NULL){
    if($type){
        $sql =  "SELECT SUM(amount) as total_amount FROM amount WHERE type = '$type' ";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0){
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data[0]['total_amount'];
        }
    }else{
        $data_income = total_budget_calculater($conn, 'income');
        $data_expense = total_budget_calculater($conn, 'expense');
        $remaining_budget = $data_income - $data_expense;
        return $remaining_budget;
    }
   
}

// get sum amount of each month
function get_amount_monthly($conn){
    $month = date('m');
    $year = date('Y');
    $sql = "SELECT SUM(amount) as total_amount FROM amount WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' ";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data[0]['total_amount'];
    }
}



// create table amount (
//     id int primary key auto_increment,
//     amount varchar(20) not null,
//     type varchar(100) not null,
//     category varchar(100) not null, 
//     date date not null,
//     description varchar(255) 
// );

