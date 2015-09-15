<?php

    header("Expires: Wed, 13 Dec 1995 05:43:00 GMT");
    header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
    header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");

?>

<!DOCTYPE html>

<!-- index.php -->

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta name="theme-color" content="#300a24" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CBVS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body spellcheck="true">

            <h1>Criminal Background Verification System</h1>

<?php
    function render_template()
    {
?>
            <!-- HTML goes here -->
<?php
    }
?>

<?php
    function login($reason)
    {
?>
        <div id="superset">
<?php
        if(isset($reason)){
?>
            <div id="note"><?php echo htmlspecialchars($reason);?></div>
<?php
        }
?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="on">
                <input class="button" id="subreq" type="submit" name="subreq" value="Submit Request" />
            </form>
            <br />
            <h2>Police Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="on">
                <input placeholder="Username" name="username" required="required" />
                <br />
                <br />
                <input type="password" placeholder="Password" name="password" required="required" />
                <br />
                <br />
                <input class="button bottom" type="submit" value="Done" />
            </form>
        </div>
<?php
    }
?>

<?php
    function console($welcome)
    {
?>
<?php
    }
?>

<?php
    function workspace()
    {
?>
            <div id="superset">
                <h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="on">
                        <input class="button" id="logout" type="submit" name="logout" value="Back" />
                    </form>
                </h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="on">
                    <h2>Employer</h2>
                    <input placeholder="Name" name="emprname" maxlength="100" required="required" />
                    <br />
                    <br />
                    <input placeholder="Telephone" name="emprtel" maxlength="100" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" title="Valid telephone numbers only" required="required" />
                    <br />
                    <br />
                    <h2>Employee</h2>
                    <input placeholder="Name" name="empename" maxlength="100" required="required" />
                    <br />
                    <br />
                    <input placeholder="Telephone" name="empetel" maxlength="100" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" title="Valid telephone numbers only" required="required" />
                    <br />
                    <br />
                    <input placeholder="Employed As" name="work" maxlength="100" title="Driver | Cook | Domestic Help" required="required" />
                    <br />
                    <br />
                    Photograph<input type="file" name="photo" required="required" />
                    <div class="bottom">
                        <input class="button bottom" type="submit" value="Done" />
                    </div>
                </form>
            </div>
<?php
    }
?>

<?php
    if(isset($_POST["logout"])){
        setcookie("username", "", 1);
        setcookie("password", "", 1);
        login("Logged Out");
    }
    else if(isset($_POST["username"]) && isset($_POST["password"])){
        $con=mysqli_connect("localhost", "plverify", "plverify", "plverify");
        $result=mysqli_query($con, "select username, password from users where username='".mysqli_real_escape_string($con, $_POST["username"])."';");
        $tuples=mysqli_fetch_array($result);
        mysqli_free_result($result);
        mysqli_close($con);
        if($_POST["username"]===$tuples[0] && $_POST["password"]===$tuples[1]){
            setcookie("username", $_POST["username"]);
            setcookie("password", $_POST["password"]);
            header("Location: index.php");
            die();
        }
        else{
            login("Incorrect Credentials");
        }
    }
    else if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        $con=mysqli_connect("localhost", "plverify", "plverify", "plverify");
        $result=mysqli_query($con, "select username, password, admin from users where username='".mysqli_real_escape_string($con, $_COOKIE["username"])."';");
        $tuples=mysqli_fetch_array($result);
        mysqli_free_result($result);
        mysqli_close($con);
        if($_COOKIE["username"]===$tuples[0] && $_COOKIE["password"]===$tuples[1]){
            if($tuples[2]==="1"){
                console($_COOKIE["username"]);
            }
            else{
                workspace($_COOKIE["username"]);
            }
        }
        else{
            login();
        }
    }
    else if(isset($_POST["subreq"])){
        workspace();
    }
    else{
        login();
    }
?>
    </body>
</html>
<!-- end of index.php -->
