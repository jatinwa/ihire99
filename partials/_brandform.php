

<div class="container my-4">
<form action="addbrand.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Brand Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Job Description</label>
        <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
