<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4">Create Post</h1>

            <form action="index.php?page=store-post" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea
                        name="content"
                        id="content"
                        class="form-control"
                        rows="8"
                        required
                    ></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control"
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Create Post
                </button>

            </form>

        </div>
    </div>

</div>


