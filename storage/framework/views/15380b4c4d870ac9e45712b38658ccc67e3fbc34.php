<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> 
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
</head>

<body>
  

        <div class="container " style="margin-top: 100px;">
          <center>
            <?php if(session()->has('status')): ?>
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    <?php echo e(session()->get('status')); ?>

                   <?php echo e(Auth::logout()); ?>

                </div>
            <?php endif; ?>
            <div class="card" style="width: 28rem;">
                <div class="card-body bg-success">
                    <h5 class="card-title text-white">Change Password</h5>

                </div>
            </div>
            <div class="card " style="width: 28rem;">
                <div class="card-body ">
                    <form method="POST" action="<?php echo e(route('auth.passwords.changePassword')); ?>">

                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Current Password</span>
                            <input type="password" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="current_password">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">New Password</span>
                            <input type="password" id="new" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="new_password">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Confirm Password</span>
                            <input type="password" id="confirm"  class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="confirm_password">
                        </div>
                        <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade  show" role="alert">
                            <?php echo e(session()->get('error')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                        <div>
                            <button id="change_button" type="submit" class="btn btn-success w-50">Change</button>
                        </div>

                    </form>
                </div>
            </div>
           </center>
            <div style="margin-left:30%;" >
                <a href="/profile" style="" id="previous"><i data-feather="back" class="ml-2"></i> Back to Previous</a>
            </div>

            
        </div>
   
     
</body>

</html>
<?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/auth/passwords/changePassword.blade.php ENDPATH**/ ?>