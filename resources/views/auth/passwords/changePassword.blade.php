<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo.png" />


</head>

<body>
    <div class="container " style="margin-top: 100px;">
        <center>
            @if (session()->has('status'))
                <div id="alert" class="alert alert-success alert-dismissible fade  show" role="alert">
                    {{  session()->get('status') }}
                    {{ Auth::logout() }}
                </div>
            @endif
            @if (session()->has('error'))
                <div id="alert" class="alert alert-danger alert-dismissible fade  show" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card" style="width: 28rem;">
                <div class="card-body" style="background:#21791A;">
                    <h5 class="card-title text-white">Change Password</h5>
                </div>
            </div>
            <div class="card " style="width: 28rem;">
                <div class="card-body ">
                    <form method="POST" action="{{ route('auth.passwords.changePassword') }}">
                        @csrf
                        <div class="input-group mb-3" style="position: relative;">
                            <span class="input-group-text" id="inputGroup-sizing-default"> <i class="fa fa-key"
                                    style="font-size:24px"></i></span>
                            <input type="password" id="cur" class="form-control" placeholder="Current Password"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="current_password" required>
                            <i class="fa fa-eye-slash mt-1" id="curr" onclick="current()"
                                style="font-size:24px; z-index:9999; margin-left:90%;  position:absolute;"></i>
                        </div>
                        <div class="input-group mb-3" style="position: relative;">
                            <span class="input-group-text"><i class="fa fa-key" style="font-size:24px"></i></span>
                            <input type="password" id="new" class="form-control" placeholder="New Password"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="new_password" required>
                            <i class="fa fa-eye-slash mt-1" id="newpass" onclick="newpass()"
                                style="font-size:24px; z-index:9999; margin-left:90%;  position:absolute;"></i>
                        </div>
                        <div class="input-group mb-3" style="position: relative;">
                            <span class="input-group-text"><i class="fa fa-key" style="font-size:24px"></i></span>
                            <input type="password" id="confirm" class="form-control" placeholder="Confirm Password"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="confirm_password" required>
                            <i class="fa fa-eye-slash mt-1" id="conf" onclick="confirm()"
                                style="font-size:24px; z-index:9999; margin-left:90%;  position:absolute;"></i>
                        </div>

                        <div>
                            <button id="change_button" type="submit" class="btn w-50 text-white"
                                style="background:#21791A;">Change</button>
                        </div>

                    </form>
                </div>
            </div>
        </center>
        <div style="margin-left:30%;">
            <a href="/profile" style="" id="previous"><i data-feather="back" class="ml-2">Back to Previous</a>
        </div>


    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    setTimeout(function() {
        $('#alert').attr('hidden', true);
    }, 3000);

    function current() {
        var x = document.getElementById("cur");
        if (x.type === "password") {
            x.type = "text";
            $('#curr').toggleClass('fa fa-eye fa fa-eye-slash');
        } else {
            x.type = "password";
            $('#curr').toggleClass('fa fa-eye-slash fa fa-eye');
        }
    }

    function newpass() {
        var x = document.getElementById("new");
        if (x.type === "password") {
            x.type = "text";
            $('#newpass').toggleClass('fa fa-eye fa fa-eye-slash');
        } else {
            x.type = "password";
            $('#newpass').toggleClass('fa fa-eye-slash fa fa-eye');
        }
    }

    function confirm() {
        var x = document.getElementById("confirm");
        if (x.type === "password") {
            x.type = "text";
            $('#conf').toggleClass('fa fa-eye fa fa-eye-slash');
        } else {
            x.type = "password";
            $('#conf').toggleClass('fa fa-eye-slash fa fa-eye');
        }
    }

</script>

</html>
