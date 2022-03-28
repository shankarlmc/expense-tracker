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

function fetchData($conn, $table, $data = NULL, $where = NULL) {
    $sql = "SELECT * FROM $table";
    if ($where || $data) {
        if ($data){
            $sql .= " WHERE ";
            $sql .= " date between '" . $data['date_from'] . "' AND '" . $data['date_to']."'";
            $sql .= " AND (";
            $sql .= " type = '" . $data['type']."'";
            $sql .= " OR ";
            $sql .= " category = '" . $data['category']."'";
            $sql .= " OR ";
            $sql .= " description LIKE '%" . $data['search'] . "%' )";  
        } else {
            $sql .= " WHERE " . $where;
        }
              
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
    $sql .= "amount = '" . $data['amount'] . "',";
    $sql .= "type = '" . $data['type'] . "',";
    $sql .= "category = '" . $data['category'] . "',";
    $sql .= "date = '" . $data['date'] . "',";
    $sql .= "description = '" . $data['description'] . "'";
    $sql .= " WHERE " . $where;
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
            return $data[0]['total_amount'] ? $data[0]['total_amount'] : 0;
        }
    }else{
        $data_income = total_budget_calculater($conn, 'income');
        $data_expense = total_budget_calculater($conn, 'expense');
        $remaining_budget = $data_income - $data_expense;
        return $remaining_budget;
    }
   
}

// get sum amount of each month
function get_total_monthly_amt($conn, $month, $type = 'expense'){
    $sql = "SELECT SUM(amount) as total_amount FROM amount WHERE type='$type' AND MONTH(date) = '$month' ";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data[0]['total_amount'] ? $data[0]['total_amount'] : 0;
    }
}