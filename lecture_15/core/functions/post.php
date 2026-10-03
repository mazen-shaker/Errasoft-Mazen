<?php

function store($data)
{
    $title = trim($data['title'] ?? '');
    $content = trim($data['content'] ?? '');

    $conn = $GLOBALS['conn'];

    if ($conn) {

        $image_path = null;

        if (!empty($_FILES['image']['name'])) {
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'uploads/posts/' . $image_name;

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $image_path
            );
        }

        $sql = "INSERT INTO posts (title, content, image_path)
                VALUES ('$title', '$content', '$image_path')";

        mysqli_query($conn, $sql);

        $_SESSION['massage'] = [
            'title' => 'Success',
            'type' => 'success',
            'massage' => 'Post added successfully'
        ];

        return header("Location: index.php?page=home");
    }
}


function index()
{
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return [];
}


function edit($id)
{
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    return [];
}



function update($data)
{
    $title = trim($data['title'] ?? '');
    $content = trim($data['content'] ?? '');
    $id = (int) ($data['id'] ?? 0);

    $conn = $GLOBALS['conn'];

    if (!$conn) {
        return;
    }

    $sql = "SELECT image_path FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);

    if (!$post) {
        return;
    }

    $old_image = $post['image_path'];
    $new_image = $old_image;

    if (
        isset($_FILES['image']) &&
        $_FILES['image']['error'] === UPLOAD_ERR_OK
    ) {

        $upload_dir = __DIR__ . '/../../uploads/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $extension = pathinfo(
            $_FILES['image']['name'],
            PATHINFO_EXTENSION
        );

        $image_name = uniqid('post_', true) . '.' . $extension;

        $target = $upload_dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

            $new_image = 'uploads/' . $image_name;

            if (
                !empty($old_image) &&
                file_exists(__DIR__ . '/../../' . $old_image)
            ) {
                unlink(__DIR__ . '/../../' . $old_image);
            }
        }
    }

    $sql = "UPDATE posts
            SET title = '$title',
                content = '$content',
                image_path = '$new_image'
            WHERE id = $id";

    mysqli_query($conn, $sql);

    $_SESSION['massage'] = [
        'title' => 'Success',
        'type' => 'success',
        'massage' => 'Post updated successfully'
    ];

    return header("Location: index.php?page=home");
}


function destroy($id)
{
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "DELETE FROM posts WHERE id = $id";
        mysqli_query($conn, $sql);

        $_SESSION['massage'] = [
            'title' => 'Success',
            'type' => 'success',
            'massage' => 'Post deleted successfully'
        ];

        return header("Location: index.php?page=home");
    }
}
