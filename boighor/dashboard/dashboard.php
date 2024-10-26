<?php
session_start();
include('config.php');
include('sidebar.php');


// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;
$offset = ($page - 1) * $perPage;

// Fetch competition entries with pagination
$competition_entries = $conn->query("
    SELECT 
        id, 
        user_id, 
        gmail, 
        story_name 
    FROM 
        competition_user 
    ORDER BY 
        id ASC 
    LIMIT $perPage OFFSET $offset");

$totalEntries = $conn->query("SELECT COUNT(*) as count FROM competition_user")->fetch_assoc()['count'];
$totalPages = ceil($totalEntries / $perPage);
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Story Competition</title>
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/boighor/dashboard/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            font-family: Arial, sans-serif;
        }

        .main-content {
            margin-left: 250px; /* Adjust this value to match the sidebar's width */
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #ce7852; /* Match the header color to the theme */
            color: #ffffff;
            font-weight: bold;
            font-size: 1.5rem;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .table {
            color: #212529;
        }

        .table thead th {
            background-color: #e9ecef;
            color: #212529;
        }

        .pagination {
            justify-content: center;
        }

        .btn {
            background-color: #ce7852;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .btn:hover {
            background-color: #d89a6a;
        }
        
    </style>
</head>
<body>
 
<hr>
<div class="main-content">
    
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Short Story Competition Entries</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Story Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $competition_entries->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['gmail']); ?></td>
                            <td><?php echo htmlspecialchars($row['story_name']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo min($totalPages, $page + 1); ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>
