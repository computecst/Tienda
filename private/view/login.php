<!DOCTYPE html>
<html lang="es">
<head>
    <title>FastPlane</title>
    <base href="<?php echo BASE_URL; ?>">
</head>
<body>
    <main id="main">

        <section class="acceso">
            <form autocomplete="off" method="post">
                <input type="email" name="p_user" placeholder="user" value="ramon@gmail.com" />
                <input type="password" name="p_pass" placeholder="password" value="hola123,"/>
                <input type="submit" name="go" value="Log in">
            </form>
        </section>
    </main>
</body>
</html>

<?php
    if(isset($_POST['go']))
    {
        $user = $_POST["p_user"];
        $pass = $_POST["p_pass"];
        
        if(!empty($user) and !empty($pass)){
            include_once "../model/store.class.php";
            $o_login = new Login();
            $user = $o_login->validation_string($user);
            $pass = $o_login->validation_string($pass);
            $num_rows = $o_login->get_login($user, $pass);

            if($num_rows === 1){
                session_start();
                $_SESSION['_user'] = $user;
                $_SESSION['_key'] = "1_tghj23!ASAS45_67i%uyt#re_T3M.,";
                header("Location: list_products.php");
            }
            else{
                echo "<span>credenciales no validas</span>";
            }


            exit("FIN");
            
            //var_dump($r);
            //exit("fin");
            //$o_login->validation_string($pass);
            
        } // datos vacios
        else{exit("fuera de aqui");}
        
    }
?>