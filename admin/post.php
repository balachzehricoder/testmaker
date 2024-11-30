<?php
include 'confiq.php';
include 'header.php';
include 'sidebar.php';
?>

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">School</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">All Schools</h4>
                            <button type="button" class="btn mb-1 btn-rounded btn-success add_btn" data-toggle="modal" data-target="#add-new-school">
                                <span class="btn-icon-left"><i class="fs-6 fa fa-plus-circle"></i></span>Add New School
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>School Name</th>
                                        <th>Phone</th>
                                        <th>Logo</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch data from 'school' table
                                    $school_query = "SELECT id, school_name, phone, logo, created_at, status FROM testdb2.schools ORDER BY school_name ASC";


                                    $school_result = $conn->query($school_query);

                                    if ($school_result->num_rows > 0) {
                                        while ($school = $school_result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>" . htmlspecialchars($school['school_name']) . "</td>
                                                <td>" . htmlspecialchars($school['phone']) . "</td>
                                                <td><img src='uploads/" . htmlspecialchars($school['logo']) . "' alt='Logo' style='width:50px;height:auto;'></td>
                                                <td>" . htmlspecialchars($school['created_at']) . "</td>
                                                <td>" . htmlspecialchars($school['status']) . "</td>
                                                <td>
                                                    <div class='updated_btns'>
                                                        <a href='edit-school.php?school_id=" . urlencode($school['id']) . "' class='text-white btn mb-0 px-3 py-0 btn-flat btn-success' style='font-size:10px;'>Edit</a>
                                                        <a href='delete-school.php?school_id=" . urlencode($school['id']) . "' class='text-white btn mb-0 px-3 py-0 btn-flat btn-danger' style='font-size:10px;'>Delete</a>
                                                    </div>
                                                </td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No schools found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>School Name</th>
                                        <th>Phone</th>
                                        <th>Logo</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
?>



<!--**********************************
            Content body end
        ***********************************-->


<?php include 'footer.php'; ?>
