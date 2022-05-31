<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園論壇</title>
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand title" href="./faceIdentify.html">AsiaLife論壇</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="school.php">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="school.php">校園</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="club.php">社團</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="house.php">房屋</a>
                        </li>
                    </ul>
                    <a class="nav-btn" href="./user_data.php">個人資料</a>
                    <a class="nav-logup-btn" href="./php/signout.php">登出</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row m-2 card-container bg-white"></div>
    </div>
    <footer class="footer">
        <div class="container d-flex justify-content-center">
            <p>Copyright © 2021 Asia University. All rights reserved. 亞洲大學資工系</p>
        </div>
    </footer>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script>
    //post_
    var post_data = new FormData(document.forms[0]);
    var data
    var comment_card = ""
    post_data.append("class", 0)
    fetch('select_post.php', {
            method: "POST",
            body: post_data,
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            console.log(myJson);
            data = myJson
            for (let i = 0; i < data.post_data.length; i++) {
                comment_card += "<div class='col-4'><div class='card m-2' style='width: 18rem;'><img class='m-1' src='data:image/jpeg;base64," + data.post_data[i].post_author_image + " 'style='width:50px;height:50px' ' class='card-img-top' alt='...'><div class='card-body'><h5 class='card-title'>" + data.post_data[i].post_title + "</h5><p class='card-text'>" + data.post_data[i].post_content + "</p><a href='post_comment.php?post_id=" + data.post_data[i].post_id + "' class='btn btn-primary'>查看貼文</a> </div> </div></div>"
                $(".card-container").html(comment_card)
            }
        });
    //
</script>

</html>