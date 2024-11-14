<button type="button" class="bg-transparent border-0 m-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Upload Post
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="./upload-post-data.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Caption</label>
                  <input type="text" name="caption" placeholder="Add a Caption" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Post</label>
                  <input type="file" name="image" class="form-control image_input">
                </div>
                <img class="post-preview" style="width: 100%; height:200px;">
                <button class="btn btn-primary w-100 my-2">Upload</button>
          </form>
      </div>
    </div>
  </div>
</div>