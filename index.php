<?php
// Start session (if needed)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Info System</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center">Basic Information System</h2>
        <div class="row">
            <div class="col-md-4">
                <h4>Add New Entry</h4>
                <form id="dataForm">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-8">
                <h4>Entries</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        <!-- Data will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch and display data
            function loadData() {
                $.get("fetch.php", function(data) {
                    $("#dataTable").html(data);
                });
            }
            loadData();

            // Handle form submission
            $("#dataForm").submit(function(e) {
                e.preventDefault();
                let name = $("#name").val();
                let email = $("#email").val();
                $.post("insert.php", { name: name, email: email }, function(response) {
                    alert(response);
                    $("#dataForm")[0].reset();
                    loadData();
                });
            });
        });
    </script>
</body>
</html>
