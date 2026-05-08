<?php

include("../controller/BookController.php");

if($_POST['action'] == "add")
{
    createBook();
}

if($_POST['action'] == "fetch")
{
    showBooks();
}

if($_POST['action'] == "delete")
{
    removeBook();
}

if($_POST['action'] == "single")
{
    singleBook();
}

if($_POST['action'] == "update")
{
    editBookData();
}

?>