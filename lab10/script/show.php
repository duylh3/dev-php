<?php
include_once 'db.php';
$conn = new PDO(DB_INFO, DB_USER, DB_PASS);

$data = '<table class="table table-bordered table-striped">
            <tr>
		<th>Id</th>
		<th>Name</th>
		<th>Year</th>
		<th>Action</th>
            </tr>';

$query = "SELECT * FROM cars";
$stmt = $conn->prepare($query);
$stmt->execute();

while($row = $stmt->fetch()){
    
    $data .= '<tr>
        <td>'.$row['id'].'</td>
	<td>'.$row['name'].'</td>
	<td>'.$row['year'].'</td>
	<td>
            <button onclick="detail('.$row['id'].')" class="btn btn-warning">Edit</button>
            <button onclick="delCar('.$row['id'].')" class="btn btn-danger">Delete</button>
	</td>
    	</tr>';
}
$data .= '</table>';

echo $data;
