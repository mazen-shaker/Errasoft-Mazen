<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <?php if (empty($posts)): ?>

                <div class="text-center my-5">
                    <h3>No posts</h3>
                </div>

            <?php else: ?>

                <?php foreach ($posts as $post): ?>

                    <div class="post-preview">

                        <a href="index.php?page=post-edit&id=<?= $post['id'] ?>">

                            <?php if (!empty($post['image_path'])): ?>

                                <img
                                    src="<?= htmlspecialchars($post['image_path']) ?>"
                                    alt="<?= htmlspecialchars($post['title']) ?>"
                                    class="img-fluid rounded mb-3"
                                >

                            <?php endif; ?>

                            <h2 class="post-title">
                                <?= htmlspecialchars($post['title']) ?>
                            </h2>

                            <h3 class="post-subtitle">
                                <?= htmlspecialchars($post['content']) ?>
                            </h3>

                        </a>

                        <p class="post-meta">
                            Posted on
                            <?= htmlspecialchars($post['created_at']) ?>
                        </p>

                        <div class="d-flex gap-2">

                            <a
                                href="index.php?page=edit-post&id=<?= $post['id'] ?>"
                                class="btn btn-info"
                            >
                                Edit
                            </a>

                            <a
                                href="index.php?page=destroy-post&id=<?= $post['id'] ?>"
                                class="btn btn-danger"
                            >
                                Delete
                            </a>

                        </div>

                    </div>

                    <hr class="my-4" />

                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>
</div>
