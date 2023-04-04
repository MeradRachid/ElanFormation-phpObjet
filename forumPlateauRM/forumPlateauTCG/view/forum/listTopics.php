<?php

    $topics = $result["data"]['topics'];

    $like = $result["data"]["likes"];
  
    // var_dump($like); 
?>

<h1>~ Bienvenue ~</h1>
<h2 class="text-center"> Listes des Topics </h2>

<!-- <form action="index.php?ctrl=forum&action=topicForm" method="post" enctype="multipart">
    <button type="submit" class="rounded p-1 border-success" style="max-width: 18rem;">Create a New Topic</button>
</form> -->

<div class="d-flex justify-content-center">

    <?php
        foreach($topics as $topic)
        {
    ?>
        <div class="card border-success m-3 text-center" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success"><?=$topic->getCreationDate()?></div>
            <div class="card-body text-success">
                <h5 class="card-title"><a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>" class="text-reset text-decoration-none"><?=$topic->getTopicTitle()?></a></h5>
                <form action="index.php?ctrl=forum&action=like&id=<?=$topic->getId()?>" method="post">
                    <button type="submit" class="rounded p-1 border-info" disabled>Liked <?= $like ? "(" . $like . ")" : "" ?> </button>
                </form>
            </div>

            <div class="card-footer bg-transparent border-success">
                <?php 
                    if($topic->getUser()->getId() == App\Session::getUser()->getId() || $topic->getUser()->getId() == App\Session::isAdmin())
                    {
                        if($topic->getTopicLocked() == true)
                        {
                            echo '<a href="#"><a href="#" class="m-1"><img src="public/img/lock-solid.svg" width="30%" height="30%" alt="trash"></a>';
                        }
                        else
                        {
                            echo '<a href="#" class="m-1"> <span class="fas fa-lock-open"></span> <img src="public/img/unlock-solid.svg" width="25%" height="25%" alt="penToSquare"></a>';
                        }
                    }
                ?>  
                <br> <a href="index.php?ctrl=forum&action=detailUser&id=<?=$topic->getUser()->getId()?>" class="text-decoration-none">By : <?= $topic->getUser()->getUserName() ?> </a> 

            </div>
        </div> 

    <?php
        }    
    ?>
</div>
