<?php

require __DIR__ . '/../core/validation/post.php';
require __DIR__ . '/../core/functions/post.php';


function storePost()
{
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    include './views/errors/405.php';
    exit;
}


    $errors = storeValidate($_POST);

    if (!empty($errors)) {
        include './views/main/home.php';
        exit;
    }

    store($_POST);
}


function updatePost()
{
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    include './views/errors/405.php';
    exit;
}


    $errors = updateValidate($_POST);

    if (!empty($errors)) {
        include './views/main/home.php';
        exit;
    }

    update($_POST);
}

function indexPost()
{
return index();
}


function editPost($id)
{
    return edit($id);
}


function destroyPost($id)
{
    return destroy($id);
}
