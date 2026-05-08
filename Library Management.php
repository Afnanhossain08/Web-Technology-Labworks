<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Library Management System</h2>

<input type="hidden" id="book_id">

<input type="text" id="title" placeholder="Book Title">
<input type="text" id="author" placeholder="Author Name">
<input type="text" id="category" placeholder="Category">

<select id="status">
    <option value="Available">Available</option>
    <option value="Not Available">Not Available</option>
</select>

<button id="addBtn">Add Book</button>
<button id="updateBtn">Update Book</button>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody id="bookData">

    </tbody>
</table>

<script>

loadData();

function loadData()
{
    $.ajax({
        url:"../ajax/bookAjax.php",
        type:"POST",
        data:{action:"fetch"},
        success:function(data)
        {
            $("#bookData").html(data);
        }
    });
}

$("#addBtn").click(function(){

    var title = $("#title").val();
    var author = $("#author").val();
    var category = $("#category").val();
    var status = $("#status").val();

    $.ajax({
        url:"../ajax/bookAjax.php",
        type:"POST",
        data:{
            action:"add",
            title:title,
            author:author,
            category:category,
            status:status
        },
        success:function()
        {
            loadData();

            $("#title").val('');
            $("#author").val('');
            $("#category").val('');
        }
    });

});

function deleteBook(id)
{
    $.ajax({
        url:"../ajax/bookAjax.php",
        type:"POST",
        data:{
            action:"delete",
            id:id
        },
        success:function()
        {
            loadData();
        }
    });
}

function editBook(id)
{
    $.ajax({
        url:"../ajax/bookAjax.php",
        type:"POST",
        data:{
            action:"single",
            id:id
        },
        success:function(data)
        {
            var row = JSON.parse(data);

            $("#book_id").val(row.id);
            $("#title").val(row.title);
            $("#author").val(row.author);
            $("#category").val(row.category);
            $("#status").val(row.status);
        }
    });
}

$("#updateBtn").click(function(){

    var id = $("#book_id").val();
    var title = $("#title").val();
    var author = $("#author").val();
    var category = $("#category").val();
    var status = $("#status").val();

    $.ajax({
        url:"../ajax/bookAjax.php",
        type:"POST",
        data:{
            action:"update",
            id:id,
            title:title,
            author:author,
            category:category,
            status:status
        },
        success:function()
        {
            loadData();

            $("#book_id").val('');
            $("#title").val('');
            $("#author").val('');
            $("#category").val('');
        }
    });

});

</script>

</body>
</html>