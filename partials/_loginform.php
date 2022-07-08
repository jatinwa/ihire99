<div class="container my-4">
        <div class="row">
            <div class="col-6">
            <div class="card text-center">
                <div class="card-header">
                   User Login
                </div>
                <div class="card-body">
                <form action="userlogin.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
                <div class="card-footer text-muted">
                    Please ensure to signUp if you do not have an account as user.
                </div>
            </div>
            </div>
            <div class="col-6">
            <div class="card text-center">
                <div class="card-header">
                   Admin Login
                </div>
                <div class="card-body">
                <form action="adminlogin.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
                <div class="card-footer text-muted">
                    Please ensure that you have an admin account before login as admin.
                </div>
            </div>
        </div>
    </div>