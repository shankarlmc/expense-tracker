<?php

$data = fetchData($conn, 'amount');
$tr = '<tr>';
$serial_no = 1;
foreach($data as $item){
    $class = $item['type'] == 'income' ? 'success' : 'danger';
    $btn_class = 
    $tr .= '<tr class="bg-'.$class.' text-light">';
    $tr .= '
        <td scope="row">'.$serial_no.'</td>
        <td>'.$item['description'].'</td>
        <td>'.$item['category'].'</td>
        <td>'.$item['date'].'</td>
        <td>Nrs '.$item['amount'].'</td>
        <td><button class="btn btn-light btn-outline-light"><a style="text-decoration:none;" href="/expense-tracker/index.php?expense='.$item["id"].'">Edit</a></button></td>
        <td>
            <form method="POST" action="./php/submit-form.php">
            <input type="hidden" name="expense" value="'.$item["id"].'" />
            <button name="delete-expense-item"  class="btn btn-danger btn-outline-light">Delete</button>
            </form>
        </td>
    ';
    $tr .= '</tr>';
    $serial_no ++;
}

$tr .= '</tr>';
echo $tr;

?>