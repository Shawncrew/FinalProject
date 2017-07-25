<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
        <!-- INSERT <script> <link> etc here  FOR EVERY SINGLE PAGE -->
        <?php if (isset($section_additional_head)) {
            // WE PROBABLY WON'T USE THIS, BUT JUST IN CASE, IT'S HERE
            include $section_additional_head;
        } ?>
    </head>
    <body>
        <!-- DO THINGS HERE THAT ARE ON EVERY PAGE ABOVE CONTENT -->
        <?php include $template; ?>
        <!-- DO THINGS HERE THAT ARE ON EVERY PAGE BELOW CONTENT -->        
    </body>
</html>