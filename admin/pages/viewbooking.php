<?php
// Establish a single-line database connection
$con = mysqli_connect("127.0.0.1", "root", "", "movietheatredb", 3306) or die("Connection failed: " . mysqli_connect_error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <!-- Go To Dashboard Button -->
    <a href="http://localhost/OnlineMovieTicketBS-PHP/admin/pages/index.php" class="btn btn-primary mb-4">Go To Dashboard</a>
    
    <h2 class="text-center mb-4">Bookings Table</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Booking ID</th>
                    <th>Ticket ID</th>
                    <th>Theater ID</th>
                    <th>User ID</th>
                    <th>Show ID</th>
                    <th>Screen ID</th>
                    <th>No. of Seats</th>
                    <th>Amount</th>
                    <th>Ticket Date</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from tbl_bookings
                $sql = "SELECT * FROM tbl_bookings";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['book_id'] . "</td>
                                <td>" . $row['ticket_id'] . "</td>
                                <td>" . $row['t_id'] . "</td>
                                <td>" . $row['user_id'] . "</td>
                                <td>" . $row['show_id'] . "</td>
                                <td>" . $row['screen_id'] . "</td>
                                <td>" . $row['no_seats'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td>" . $row['ticket_date'] . "</td>
                                <td>" . $row['date'] . "</td>
                                <td>" . ($row['status'] ? 'Confirmed' : 'Pending') . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>No bookings found</td></tr>";
                }
                // Close connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
