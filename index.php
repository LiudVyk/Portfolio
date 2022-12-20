<?php
include("assets/inc/headerFront.php");
?>
    <title>Portfolio</title>
<?php 
    include("assets/inc/headFront.php");
?>

    <main>
    
    <div class="container">
        <div class="row">
            <?php
            if(isset($_SESSION["message"])){
                echo '<div class="alert alert-sucess" role="alert">' .$_SESSION["message"] . "</div>";
                //on efface la clé message, un fois qu'elle a été affiche avec unset()
                unset($_SESSION["message"]);
            }
            ?>
        </div>

        <h2 id ="about">About</h2>

        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae inventore sint ea aspernatur eos nemo accusamus facilis, nesciunt porro cumque quia expedita sit harum? Magni, deleniti aut? Ex, odio saepe.</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo labore natus beatae nemo voluptatem omnis eius molestias. Animi quidem voluptatum eligendi! Reprehenderit suscipit perferendis ut dolorem recusandae similique facere corporis.</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus harum delectus asperiores autem et, consequatur nemo amet cupiditate ipsum culpa architecto alias quo distinctio? Eaque officiis quod maiores rem quibusdam.</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quae, fugit impedit voluptatum itaque aliquid odit nisi ipsam nesciunt nemo aliquam, laborum minima expedita enim ducimus, voluptate dolores optio incidunt!</div>
        <div></div>
        <h2 id = "project">Project</h2>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, fugit et facilis assumenda in, laboriosam aliquid perspiciatis quas obcaecati rerum ipsam odit, quam dolores excepturi illo vitae consequuntur neque molestiae.</div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <h2 id = "contact">Contact</h2>
    </main>

<?php
include("assets/inc/footerFront.php");

?>