<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
        <!-- INSERT <script> <link> etc here  FOR EVERY SINGLE PAGE -->
        <link rel="stylesheet" href="/Project4/css/style.css">
        <link rel="stylesheet" href="/Project4/css/bootstrap.min.css">    
        <link rel="stylesheet" href="/Project4/css/bootstrap-theme.min.css">
        <script src="/Project4/js/jquery.min.js"></script>
        <script src="/Project4/js/bootstrap.min.js"></script>
        <?php if (isset($section_additional_head)) {
            // WE PROBABLY WON'T USE THIS, BUT JUST IN CASE, IT'S HERE
            include $section_additional_head;
        } ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <h1 class="text-center"><a href="/Project4/">Project 4 - Virtual Travel Agent</a></h1>
                </div>
                <?php if(isset($_SESSION['user_id'])): ?>
                <div class="col-md-3 col-md-offset-3">
                    Hello, <a href=<?php echo '"/Project4/Customer/Edit/' . $_SESSION['user_id'] . '"';?>><?php echo $_SESSION['user_username'];?></a>
                    <div class="dropdown" style="display:inline-block;">
                        <button type="button" class="btn btn-xs btn-default" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href=<?php echo '"/Project4/Order/ForCustomer/' . $_SESSION['user_id'] . '"';?>>View Orders</a></li>
                            <li><a href=<?php echo '"/Project4/Customer/Edit/' . $_SESSION['user_id'] . '"';?>>Edit Profile</a></li>
                            <li><a href="/Project4/Customer/Logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <?php else:?>
                <div class="col-md-4 col-md-offset-2">
                    <form class="form-inline">
                        <div clas="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="inputUser">Username</label>
                                    <input type="user" class="form-control input" id="inputUser" placeholder="Username">
                                    <button type="submit" class="btn btn-xs btn-primary">Login</button>
                                </div>              
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control input" id="inputPassword" placeholder="Password">
                                    <a class="btn btn-xs btn-primary" href="/Project4/Customer/Register">Register</a>
                                </div>              
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <hr>
            <!-- DO THINGS HERE THAT ARE ON EVERY PAGE ABOVE CONTENT -->
            <?php include $this->template; ?>
            <!-- DO THINGS HERE THAT ARE ON EVERY PAGE BELOW CONTENT -->  
        </div>      
    </body>
</html>