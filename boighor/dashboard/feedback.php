<?php
session_start();
include 'config.php';
include 'sidebar.php';
// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;
$offset = ($page - 1) * $perPage;
// Fetch data with pagination
$feedback = $conn->query("
    SELECT 
        f.feedback_id, 
        u.user_id, 
        f.feedback_text, 
        f.rating
    FROM 
        feedback f
    INNER JOIN 
        user_deatail u ON f.user_id = u.user_id
    ORDER BY 
        f.feedback_id ASC
    LIMIT $perPage OFFSET $offset");

$totalFeedback = $conn->query("SELECT COUNT(*) as count FROM feedback")->fetch_assoc()['count'];
$totalPages = ceil($totalFeedback / $perPage);
?>
<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders Details</title>
    <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
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
/*
        .card:hover {
            transform: scale(1.02);
        } */

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
            color: #fff;
        }

        .table {
            color: #141412;
        }

        .table thead th {
            background-color: #ccc;
            color: #141412;
            border-bottom: 2px solid #e53935;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #ccc;
            color: #141412;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ccc;
        }

        .table-hover tbody tr:hover {
            background-color: #9f9a9a;
            color:#000;
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

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

</style>
</head>
<body>
<div class="main-content">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="mb-0">FeedBack</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Feedback ID</th>
                            <th>User ID</th>
                            <th>FeedBack Txt</th>
                            <th>Rating</th>
                            <th>Action</th>

                        </tr>
                    </thead>
<tbody>
    <?php while ($row = $feedback->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['feedback_id']); ?></td>
        <td><?php echo htmlspecialchars($row['user_id']); ?></td>
        <td><?php echo htmlspecialchars($row['feedback_text']); ?></td>
        <td><?php echo htmlspecialchars($row['rating']); ?></td>
                
        <td>
            <!-- <a href="view_movies.php?id=<?php echo $row['feedback_id']; ?>" class="btn btn-info btn-sm">View</a> -->
            <a href="edit_feedback.php?id=<?php echo $row['feedback_id']; ?>" class="btn btn-warning btn-sm mb-2">Edit</a>
            <a href="delete_feedback.php?id=<?php echo htmlspecialchars($row["feedback_id"]); ?>" class="btn btn-danger btn-sm">Delete</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>