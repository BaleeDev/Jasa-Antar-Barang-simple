<?php
@session_start();
include 'db.php';

if (@$_SESSION['BaleeDev']) {
    header("location: admin.php");
} else {
?>


    <!doctype html>
    <html lang="en">

    <head>
        <style type="text/css">
            body {
                font-family: arial;
                font-size: 14px;
                background-color: white;
            }

            #utama {
                width: 300px;
                margin: 0 auto;
                margin-top: 12%;

            }

            #judul {
                padding: 15px;
                text-align: center;
                color: white;
                font-size: 20px;
                background-color: darkcyan;
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
                border-bottom: 3px solid darkcyan;
            }

            #inputan {
                background-color: #eaeaec;
                padding: 20px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            input {
                padding: 10px;
                border: 0;
                margin-top: 10px;
            }

            .lg {
                width: 240px;
            }

            .btn {
                text-align: center;
                width: 100px;
                background-color: darkcyan;
                border-radius: 10px;
                color: #fff;
            }

            .btn:hover {
                background-color: darkcyan;
                cursor: pointer;
            }
        </style>
        <title>Halaman Login AtongBae</title>

    </head>

    <body>
        <div id="utama">
            <div id="judul">AtongBae</div>
            <div id="inputan">
                <form action="" method="post">
                    <div>
                        <input class="lg" type="text" name="user" placeholder="Username">
                    </div>
                    <div>
                        <input class="lg" type="password" name="pass" placeholder="Password">
                    </div>
                    <div>
                        <input class="btn" type="submit" name="login" value="Login">
                    </div>
                </form>

                <?php
                $user = @$_POST['user'];
                $pass = @$_POST['pass'];
                $login = @$_POST['login'];

                if ($login) {
                    if ($user == "" || $pass == "") {
                ?> <script type="text/javascript">
                            alert("Username / Password Tidak Boleh Kosong");
                        </script> <?php

                                } else {
                                    $sql = mysqli_query($conn, "select * from tbl_admin where username='$user' && Password = '$pass'");
                                    $CEK = mysqli_num_rows($sql);
                                    $data = mysqli_fetch_array($sql);
                                    if ($CEK > 0) {
                                        if ($data['username'] != "") {
                                            @$_SESSION['BaleeDev'] = $data['username'];
                                            header("location: admin.php");
                                        }
                                    } else {
                                        echo "Login Gagal";
                                    }
                                }
                            }
                                    ?>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>