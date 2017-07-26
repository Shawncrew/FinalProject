<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
        <!-- INSERT <script> <link> etc here  FOR EVERY SINGLE PAGE -->
        <link rel="stylesheet" href="/Project4/css/style.css">
        <link rel="stylesheet" href="/Project4/css/bootstrap.min.css">    
        <link rel="stylesheet" href="/Project4/css/bootstrap-theme.min.css">
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
            <div class="col-md-6">
                <form class="form-inline">
                  <div class="form-group">
                    <label for="inputUser">Username</label>
                    <input type="user" class="form-control" id="inputUser" placeholder="Username">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>              
                  <button type="submit" class="btn btn-primary">Login</button>
                    
                </form>
                <form class="form-inline" action="/Project4/Customer/Register">
                        <button type="submit" class="btn btn-primary">Register</button>
                      </form>

            </div>
        </div>
        <hr>
        <!-- DO THINGS HERE THAT ARE ON EVERY PAGE ABOVE CONTENT -->
        <?php include $this->template; ?>
        <!-- DO THINGS HERE THAT ARE ON EVERY PAGE BELOW CONTENT -->  
        </div>      
    </body>
</html>