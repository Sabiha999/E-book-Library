<?php
session_start();
include('config.php');
include('sidebar.php');

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;
$offset = ($page - 1) * $perPage;

// Fetch data with pagination
$book_details = $conn->query("
    SELECT 
        b.book_id, 
        b.title, 
        b.author, 
        b.publication_date,
        b.genre,
        b.price,
        b.description,
        b.image_path
    FROM 
        book_details b
    ORDER BY 
        b.book_id ASC
    LIMIT $perPage OFFSET $offset");

$totalBooks = $conn->query("SELECT COUNT(*) as count FROM book_details")->fetch_assoc()['count'];
$totalPages = ceil($totalBooks / $perPage);
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
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
            transition: transform 0.3s;
        }

        .card-header {
            background-color: #ce7852; /* Match the header color to the theme */
            color: #141412;
            font-weight: bold;
            font-size: 1.5rem;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-header h4 {
            margin: 0;
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

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
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
<hr>
<div class="main-content">
    <div class="card shadow">
        <button class="btn"><a href="addnewbook.php">Insert</a></button>
        <div class="card-header">
            <h4 class="mb-0">Book Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Image Path</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Pub-Date</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $book_details->fetch_assoc()): ?>
                        <?php $image = htmlspecialchars($row['image_path'] ?? ''); ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                            <td>
                                <img src="<?php echo '../images/books/' . $image; ?>" alt="Book Image" style="width: 100px; height: auto;">
                            </td>
                            <td><?php echo htmlspecialchars($row['title'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['author'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['publication_date'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['genre'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['price'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['description'] ?? 'No description available'); ?></td>
                            <td>
                                <a href="updatebook.php?book_id=<?php echo $row['book_id']; ?>" class="edit-btn btn-sm">  <img src="icons/edit.png" alt="" style="height:20px;width:20px;"></a>
                                <a href='delete_book.php?book_id=<?php echo htmlspecialchars($row["book_id"]); ?>' class="dltbtn ">  <img src="icons/trash.png" alt="" style="height:25px;width:25px;"></a>
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
