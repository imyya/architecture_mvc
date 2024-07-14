    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="shortcut icon" href="#">
        <title>Document</title>
    </head>
    <body>  
        <div class="container" >
            <div class="flex flex-col " style="background-color:rgb(209, 195, 179); height: 100%; width: 100%;">
                <div class="flex center self-center " style=" height: 15%; width: 99.5%; background-color: rgb(47, 68, 77); border-radius: 0.5rem;">
                        
                <p style="font-size: 5rem; color:rgb(145, 134, 134); text-align: center; padding-top: 1rem;">ACTUALITES POLYTECHNIQUES</p>
                </div>

                <div class="flex space-around" style="padding-top: 1.5rem;" >
                    <a href="http://localhost:8000/public/homepage" style="font-size: 1.4rem; text-decoration: none; font-weight: bold; color: rgb(88, 76, 33); padding: 0.5rem;">Accueil</a>
                    <a href="http://localhost:8000/public/article/filterByCategory/actualite" style="font-size: 1.4rem; text-decoration: none; font-weight: bold; color: rgb(88, 76, 33); padding: 0.5rem;">Actualite</a>
                    <a href="http://localhost:8000/public/article/filterByCategory/sport" style="font-size: 1.4rem; text-decoration: none; font-weight: bold; color: rgb(88, 76, 33); padding: 0.5rem;">Sport</a>
                    <a href="" style="font-size: 1.4rem; text-decoration: none; font-weight: bold; color: rgb(88, 76, 33); padding: 0.5rem;">Question</a>
                </div>

            </div>
          
            <div style="display: flex; flex-direction:column; justify-content:space-around; font-size:1.5rem">
            <?php
            $displayArticles = $articles ?? $categ_articles ?? [];
            if (!empty($displayArticles)) :
                foreach($displayArticles as $row) : 
            ?>    
                <div style="border: 2px solid black;">
                    <p>
                        <?php echo $row['conteu']; ?>
                    </p>
                </div>
            <?php
                endforeach;
            else :
            ?>
                <p>Aucun article trouvé.</p>
            <?php endif; ?>
               
            </div>
        
        </div>
     
        
    </body>
    </html>