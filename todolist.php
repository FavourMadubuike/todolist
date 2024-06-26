<?php
include("connection.php");

// Check if delete parameter is set in URL
if(isset($_POST['submit'])){
    $title = $_POST['myinput'];
    $dat= $_POST['kon'];
    $myinsertquery = "INSERT INTO title_tbl (title, `date`) VALUES ('$title', '$dat')";
    mysqli_select_db($connect, "todolist");
    mysqli_query($connect, $myinsertquery);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM title_tbl WHERE Serial_no = '$id'";
    mysqli_select_db($connect, "todolist");
    mysqli_query($connect, $deleteQuery);
}


// Select S/N and title from the database
$sql = "SELECT * FROM title_tbl";
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="todolist.css">
    <title>To Do list</title>
    
</head>
<body>
    <form action="" class="bg-danger p-3 m-4" method="post">

            <div class="d-flex justify-content-evenly">
                <h1 class="text-light text-center fs-2 fw-bold">My To Do list</h1>
        
                <input type="date" name="kon" class="border border-0 px-4 me-5"  id="date">
            </div>
            
            <div class="p-3">
                <input type="text" class="col-8 p-2 border border-0" name="myinput" id="myinput" placeholder="Title..." autocomplete="off">
        
                <button class="btn btn-outline-success text-light border rounded-0 p- col-3" type="submit" name="submit">Add Task</button >
            </div>
            

            <!-- Display the tasks -->
            <div class="tasks-container">
                <table class="table table-dark table-striped table-hover table-sm">
               
                    <tbody>
                        <?php
                        // Display tasks
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td><a href='todolist.php?delete=" . $row['Serial_no'] . "'><i class='fas fa-times'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </form>
</body>
</html>