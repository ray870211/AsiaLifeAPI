<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>人臉註冊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/backstage.css" />
    <link rel="stylesheet" href="./css/camera_from.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" rel="stylesheet">
    </link>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand title" href="./faceIdentify.html">AsiaLife</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">學生資料</h5>
                        <div class="card-text table-group align-items-center">


                            <input class="form-control form-control-lg m-2 student-input" type="text" placeholder="姓名" aria-label=".form-control-lg example" name="name" />
                            <input class="form-control form-control-lg m-2 student-input" type="text" placeholder="學號" aria-label=".form-control-lg example" name="u_id" />
                            <input class="form-control form-control-lg m-2 student-input" type="text" placeholder="系所" aria-label=".form-control-lg example" name="myclass" />
                            <input class="form-control form-control-lg m-2 student-input" type="text" placeholder="信箱" aria-label=".form-control-lg example" name="email" />
                            <input class="form-control form-control-lg m-2 student-input" type="text" placeholder="密碼" aria-label=".form-control-lg example" name="password" />
                            <select class="form-control form-control-lg m-2 student-input" aria-label=".form-control-lg example" name="gender" style="color: #989898">
                                <option disabled="disabled" selected="selected">性別</option>
                                <option value="Male">男</option>
                                <option value="Women">女</option>
                            </select>
                        </div>
                        <button onclick="registerClick()" class="card-btn" id="register">更改</button>
                    </div>
                    <div id="alert" class="alert alert-danger d-none" role="alert">
                        This is a warning alert—check it out!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="js/register.js"></script>
    <script>
        var post_data = new FormData(document.forms[0]);
        var data
        var comment_card = ""
        post_data.append("class", 0)
        fetch('select_sql.php', {
                method: "POST",
                body: post_data,
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(myJson) {
                console.log(myJson);
                data = myJson

            });
    </script>
</body>

</html>