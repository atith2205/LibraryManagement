<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {
    $title = sanitize(trim($_POST['title']));
    $author = sanitize(trim($_POST['author']));
    $label = sanitize(trim($_POST['label']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisher = sanitize(trim($_POST['publisher']));
    $select = sanitize(trim($_POST['select']));
    $category = sanitize(trim($_POST['category']));
    $call = sanitize(trim($_POST['call']));
    $sql = "INSERT INTO books(bookTitle, author, ISBN, bookCopies, publisherName, available, categories, callNumber)
                 values ('$title','$author','$label','$bookCopies','$publisher','$select','$category','$call')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>
                alert('New Book has been added ');
				location.href ='bookstable.php';
			</script>";
    } else {
        echo "<script>
                alert('Book not added!');
			</script>";
    }
}
?>
<div class="container">
    <?php include "includes/nav.php"; ?>
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">
            <p class="page-header h1" style="text-align: center">ADD BOOK</p>
            <div class="container p-5 rounded" style="background-color:#f6f6f6;">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                    <div class="form-group row">
                        <label for="Title" class="col-sm-3 control-label">BOOK TITLE</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" id="Title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Author" class="col-sm-3 control-label">AUTHOR</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="author" placeholder="Enter Author" id="Author" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ISBN" class="col-sm-3 control-label">ISBN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="label" placeholder="Enter ISBN" id="ISBN" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Book Copies" class="col-sm-3 control-label">BOOK COPIES</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="bookCopies" placeholder="Enter BOOK COPIES" id="Book Copies" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Publisher" class="col-sm-3 control-label">PUBLISHER</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" id="Publisher" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="col-sm-3 control-label">AVAILABLE</label>
                        <div class="col-sm-9">
                            <select custom-select custom-select-lg name="select" required>
                                <option>SELECT</option>
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CATEGORY" class="col-sm-3 control-label">CATEGORY</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category" placeholder="Enter Category" id="CATEGORY" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CALL NUMBER" class="col-sm-3 control-label">CALL NUMBER</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="call" placeholder="Enter Phone number" id="CALL NUMBER" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-auto">
                            <button name="submit" class="btn btn-primary  data-toggle=" modal" data-target="#info">
                                ADD BOOK
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var input = document.getElementById('title').focus();
        }
    </script>
    </body>

    </html>