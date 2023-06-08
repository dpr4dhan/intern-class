<!-- Modal -->
<div class="modal fade" id="postUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" id="postUpdateForm">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="update_title" id="update_title">
                        <span class="text-danger" id="update_titleError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control desc" name="update_short_description" id="update_short_description" cols="30" rows="4"></textarea>
                        <span class="text-danger" id="update_short_descriptionError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control desc" name="update_description " id="update_description" cols="30" rows="7"></textarea>
                        <span class="text-danger" id="update_descriptionError"></span>
                    </div>
                    <div class="mb-3 ">
                        <label for="published_at" class="form-label">Published At</label>
                        <input type="text" name="update_published_at" id="update_published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at">
                        <span class="text-danger" id="update_published_atError"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closePostUpdateModal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


