<?php
session_start();
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] == 'user') 
{$id = $_SESSION['id'];
}
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signup.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    </div>
                    <h3 class="my-1 mx-1">Sign up as</h3>
                    <div class="d-flex">
                    <div class="mb-3 form-check mx-2">
                        <input type="checkbox" class="form-check-input" id="users" name="tablename" value="users">
                        <label class="form-check-label" for="users">user</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="admins" name="tablename" value="admins">
                        <label class="form-check-label" for="admins">admin</label>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">iHire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/sampleproject/">Home</a>
                </li>
                <?php
                if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] == 'user'){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="brands.php">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userprofile.php?id='. $id .'">Profile</a>
                </li>';
                }
                if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] == 'admin'){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="posts.php?admin_id='. $_SESSION['brand_by'] .'">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="applications.php">Applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shortlist.php">shorlist</a>
                </li>
                ';
                }
                ?>
            </ul>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo '<p class="my-2">Hi, ' . $username . '</p><button class="btn btn-primary mx-2"><a href="/sampleproject/logout.php" class="text-decoration-none text-light">Logout</a></button>';
            }
            if(!isset($_SESSION['loggedin'])){
                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">SignUp</button>';

            }
            ?>
        </div>
    </div>
</nav>
