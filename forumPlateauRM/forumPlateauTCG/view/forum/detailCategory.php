<h1>~ Bienvenue sur Category Detail ~</h1>

<?php 

    $topics = $result["data"]['topics'];

?>

<?php
    if (!empty($topics)) 
    {
        foreach($topics as $topic) 
        {
?>
            <div class="card border-success mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success"><?=$topic->getCreationDate()?></div>
                <div class="card-body text-success">
                    <h5 class="card-title"><a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>" class="text-reset text-decoration-none"><?=$topic->getTopicTitle()?></a></h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
                <div class="card-footer bg-transparent border-success"><a href="index.php?ctrl=forum&action=detailUser&id=1" class="text-decoration-none">By : Mac Intosh</div></a>
            </div>
            
            <div>
                <a href="index.php?ctrl=forum&action=detailUser&id=1=<?=$topic->getId()?>"><?=$topic->getTopicTitle()?></a>
            </div>
<?php
        }
    }
    else
    {
        echo "No topics found.";
    }
?>

