<?php

$post = get_post();
if($post == false){
    header("Location:index.php?page=error");
}else{
    ?>
        </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
        </div>
    </div>
        <div class="container">

            <h2><?= $post->title ?></h2>
            <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></h6>
            <p><?= nl2br($post->content); ?></p>
    <?php
}
?>

            <hr>
            <h4>Commentaires:</h4>
            <?php
                $responses = get_comments();
                if($responses != false){
                    foreach($responses as $response){
                        ?>
                            <blockquote>
                                <strong><?= $response->name ?> (<?= date("d/m/Y", strtotime($response->date)) ?>)</strong>
                                <?php
                                    if($response->seen == 1)
                                    {
                                ?>
                                    <a href="" class="waves-effect" title="Signaler un abus" id="<?=$response->id?>"><i class="material-icons">report_problem</i></a>
                                    <script type="text/javascript">
                                        $('#<?=$response->id?>').click(function(){
                                            <?php set_seen($response->id); ?>
                                        });
                                    </script>
                                <?php
                                }
                                else{
                                ?>
                                    <a href="" class="btn-flat waves-effect disabled" title="En attente de modération"><i class="material-icons">report_problem</i></a>
                                <?php
                                }
                                ?>
                                
                                <p><?= nl2br($response->comment); ?></p>
                            </blockquote>
                        <?php
                    }
                }else echo "Aucun commentaire n'a été publié... Soyez le premier!";
            ?>
          
            <h4>Commenter:</h4>

            <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));


                    $errors = is_comment($name, $email, $comment);


                    if(!empty($errors)){
                        ?>
                            <div class="card red">
                                <div class="card-content white-text">
                                    <?php
                                        foreach($errors as $error){
                                            echo $error."<br/>";
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }else{
                        comment($name,$email,$comment);
                        ?>
                            <script>
                                window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                            </script>
                        <?php
                    }

                }

            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">Commentaire</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" name="submit" class="btn waves-effect">
                            Commenter ce post
                        </button>
                    </div>
                </div>
            </form>


/*
        get_post : Récupérer tous les posts(articles) dont le writer est l'adresse email de l'admins
        avec comme id celui passé dans l'url, et posted =1

        renvoi d'un objet via fetchObject

        Presentation de l'article titre /nom de l'auteur /date de a derniere modification / contenu 

        get_comment : Recuperer les commentaires en fonction de l'id de l'article ordonée par date decroissante

        boucle: foreach qui detaille si get_comment n'est pas vide 

        le nom de celui qui emet le commetaire 
        la date d'ecriture
        le contenu du commentaire 
        un bouton permettant de signaler un commentaire abusif

        un formulaire permettant nom/adresse email/commetaire/bouton submit

        controller: qui s'occupe du traitement de ce commentaire






*/