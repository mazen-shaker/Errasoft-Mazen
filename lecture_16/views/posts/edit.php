<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <div class="row">

            <div class="col-8 mx-auto">

                <?php if (isset($_SESSION['massage'])): ?>

                    <?php
                    $massage = $_SESSION['massage'];
                    $type = $massage['type'] === 'error' ? 'danger' : $massage['type'];
                    ?>

                    <div class="alert alert-<?= htmlspecialchars($type) ?> alert-dismissible fade show my-4" role="alert">
                        <strong><?= htmlspecialchars($massage['title']) ?></strong>
                        <div><?= htmlspecialchars($massage['massage']) ?></div>
                    </div>

                    <?php unset($_SESSION['massage']); ?>

                <?php endif; ?>


                <form action="index.php?page=update-post" method="POST" class="form border p-2 my-5" enctype="multipart/form-data">
                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($post['id']) ?>"
                    >

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="<?= htmlspecialchars($post['title']) ?>"
                            class="form-control border border-success"
                            placeholder="Post title"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">
                            Content
                        </label>

                        <textarea
                            name="content"
                            id="content"
                            rows="8"
                            class="form-control border border-success"
                            placeholder="Post content"
                        ><?= htmlspecialchars($post['content']) ?></textarea>
                    </div>

                    <?php if (!empty($post['image_path'])): ?>

                        <div class="mb-3">
                            <label class="form-label">
                                Current Image
                            </label>

                            <div>
                                <img
                                    src="<?= htmlspecialchars($post['image_path']) ?>"
                                    alt="<?= htmlspecialchars($post['title']) ?>"
                                    class="img-fluid rounded"
                                    style="max-height: 250px;"
                                >
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Replace Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                        >
                    </div>

                    <input
                        type="submit"
                        value="Update Post"
                        class="form-control btn btn-primary my-3"
                    >

                </form>

            </div>

        </div>
    </div>

</body>
</html>
