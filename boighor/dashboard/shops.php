<?php
session_start();
include('config.php');
include('sidebar.php');

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5; // This defines how many records per page
$offset = ($page - 1) * $perPage;

// Fetch data with pagination
$shop_details = $conn->query("
    SELECT 
        shop_id, 
        image_path, 
        shop_name, 
        location, 
        manager_name, 
        description, 
        contact_number, 
        email 
    FROM 
        shops
    ORDER BY 
        shop_id ASC 
    LIMIT $perPage OFFSET $offset
");

// Check for errors in the SQL query
if (!$shop_details) {
    die("Error in query: " . $conn->error);
}

// Fetch total number of shops for pagination
$totalShops = $conn->query("SELECT COUNT(*) as count FROM shops")->fetch_assoc()['count'];
$totalPages = ceil($totalShops / $perPage);

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shops Description</title>
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="/boighor/dashboard/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #ccc;
            color: #141412;
            font-family: Arial, sans-serif;
        }

        .main-content {
            margin-left: 250px; /* Adjust this value to match the sidebar's width */
            padding: 20px;
        }

        .card {
            background-color: #ccc;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #ce7852;
            color: #141412;
            font-weight: bold;
            font-size: 1.5rem;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
        }

        .table {
            color: #141412;
        }

        .table thead th {
            background-color: #ccc;
            color: #141412;
            border-bottom: 2px solid #e53935;
        }

     

        .table-hover tbody tr:hover {
            background-color: #9f9a9a;
            color: #000;
        }

        .pagination {
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #ce7852;
            border-color: #ce7852;
        }

        .pagination .page-link {
            color: #ce7852;
        }

        .btn {
            background-color: #ce7852; 
    transition: background-color 0.3s ease; 
            width:10vw;
            margin-bottom:2px;
        }
        .btn a {
           
            color: #ffffff !important;
        }
        .btn:hover {
            background-color: #d89a6a; 
            width:10vw;
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="card shadow">
        <button class="btn"><a href="addshop.php">Insert</a></button>
        <div class="card-header">
            <h4 class="mb-0">Shops Description</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Shop ID</th>
                        <th>Image</th>
                        <th>Shop Name</th>
                        <th>Location</th>
                        <th>Manager Name</th>
                        <th>Description</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $shop_details->fetch_assoc()): ?>
                        <?php $image = htmlspecialchars($row['image_path'] ?? ''); ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['shop_id']); ?></td>
                            <td>
                                <img src="<?php echo '../images/books/' . $image; ?>" alt="Shop Image" style="width: 100px; height: auto;">
                            </td>
                            <td><?php echo htmlspecialchars($row['shop_name'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['location'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['manager_name'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['description'] ?? 'No description available'); ?></td>
                            <td><?php echo htmlspecialchars($row['contact_number'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>
                            <td>
                                <a href="editshop.php?shop_id=<?php echo $row['shop_id']; ?>" class="edit-btn btn-sm">   <img src="icons/edit.png" alt="" style="height:20px;width:20px;"></a><br>
                                <a href='deleteshop.php?shop_id=<?php echo htmlspecialchars($row["shop_id"]); ?>' class="dlt-btn">   <img src="icons/trash.png" alt=""  style="height:25px;width:25px;"> </a>
                            </td> 
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

<?php
$conn->close();
?>
