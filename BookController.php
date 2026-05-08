<?php

include("../model/BookModel.php");

function createBook()
{
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    addBook($title,$author,$category,$status);
}

function showBooks()
{
    $data = getBooks();

    while($row = mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
            <td>$row[id]</td>
            <td>$row[title]</td>
            <td>$row[author]</td>
            <td>$row[category]</td>
            <td>$row[status]</td>
            <td>
                <button onclick='editBook($row[id])'>Edit</button>
                <button onclick='deleteBook($row[id])'>Delete</button>
            </td>
        </tr>
        ";
    }
}

function removeBook()
{
    $id = $_POST['id'];

    deleteBook($id);
}

function singleBook()
{
    $id = $_POST['id'];

    $data = getSingleBook($id);

    $row = mysqli_fetch_assoc($data);

    echo json_encode($row);
}

function editBookData()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    updateBook($id,$title,$author,$category,$status);
}

?>