<?php

if (isset($_GET['date-from']) || isset($_GET['date-to'])) {
    $date_from = clean($_GET['date-from']);
    $date_to = clean($_GET['date-to']);
    $type = clean($_GET['type']) ? clean($_GET['type']) : '';
    $category = clean($_GET['category']) ? clean($_GET['category']) : '';
    $search = clean($_GET['search']) ? clean($_GET['search']) : '';
    $table_data = array(
        'date_from' => $date_from,
        'date_to' => $date_to,
        'type' => $type,
        'category' => $category,
        'search' => $search
    );
    $table = "amount";
    $data = fetchData($conn, $table, $table_data, $where);
} else {
    $table = "amount";
    $data = fetchData($conn, $table);
}
$tr = '<tr>';
$serial_no = 1;
foreach ($data as $item) {
    $class = $item['type'] == 'income' ? 'success' : 'danger';
    $btn_class =
        $tr .= '<tr class="bg-' . $class . ' text-light">';
    $tr .= '
        <td scope="row">' . $serial_no . '</td>
        <td>' . $item['description'] . '</td>
        <td>' . $item['category'] . '</td>
        <td>' . $item['date'] . '</td>
        <td>Nrs ' . $item['amount'] . '</td>
        <td><button class="btn btn-light btn-outline-light"><a style="text-decoration:none;" href="/expense-tracker/index.php?edit-expense=' . $item["id"] . '">Edit</a></button></td>
        <td>
            <form method="POST" action="./php/submit-form.php">
            <input type="hidden" name="expense" value="' . $item["id"] . '" />
            <button name="delete-expense-item"  class="btn btn-danger btn-outline-light">Delete</button>
            </form>
        </td>
    ';
    $tr .= '</tr>';
    $serial_no++;
}

$tr .= '</tr>';
echo $tr;
