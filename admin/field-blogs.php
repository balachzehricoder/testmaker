<?php 
include 'confiq.php'; 
include 'header.php';
include 'sidebar.php'; 

// Fetch existing data from the database
$sql = "SELECT * FROM blog_banner LIMIT 1"; // Adjust your table and condition
$result = $conn->query($sql);

// Initialize variables with default values
$bannerImage = 'images/big/img1.jpg'; // Default image
$bannerSubTitle = '';
$bannerTitle = '';

if ($result && $result->num_rows > 0) {
    // Load the existing data
    $row = $result->fetch_assoc();
    $bannerImage = $row['banner_image'] ?: $bannerImage;
    $bannerSubTitle = $row['banner_sub_title'];
    $bannerTitle = $row['banner_title'];
}
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="field-blogs-config.php" enctype="multipart/form-data">
                                <h4 class="card-title" style="display: block;">Banner Content</h4>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="banner_image">
                                    <label class="custom-file-label">Banner Image</label>
                                </div>
                                <div class="baner-image">
                                    <img class="img-fluid my-2" style="width:100%; height:250px; object-fit:cover;" src="<?php echo $bannerImage; ?>" alt="">
                                </div>
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-6">
                                        <label>Sub Title</label>
                                        <input type="text" class="form-control" name="banner_sub_title" placeholder="Sub Title" value="<?php echo $bannerSubTitle; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="banner_title" placeholder="Title" value="<?php echo $bannerTitle; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-flat btn-success btn-block">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; 
?>
