<!DOCTYPE html>
<html>      

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style_quiz.css">
    <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
    <title>Quiz</title>
</head>

    <body>

        <?php include_once('./Components/header.php'); ?>
            
<!-- Box contenant l'introduction et les thématiques -->
<div class = "partie1"> 
                
    <header>

        <h1 class="titre11">Air et environnement</h1>
            <p class = "text11">
            La qualité de l'air peut être modifiée par des polluants qui peuvent être d’origine naturelle ou d’origine anthropique, c’est-à-dire liés à l’activité humaine. La pollution de l’air a des effets significatifs sur la santé et l’environnement, qui engendrent des coûts importants pour la société. Le droit européen fixe des valeurs limites pour certains polluants dans l’air à partir des études épidémiologiques, conduites notamment par l’Organisation mondiale de la santé. Malgré une tendance à l’amélioration de la qualité de l’air au cours des 20 dernières années, ces valeurs limites ne sont toujours pas respectées dans plusieurs zones.
            </p>

    </header>   
                
    <section>
                    
        <h1 class="titre22">Thématiques</h1>
                  
            <div class="boutonq_quiz">
                <button class="button" onclick="window.location.href='quiz.php';">Enjeux</button>
                <button class="button active2" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                <button class="button" onclick="window.location.href='quiz4.php';">Effets santé</button>
                <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
            </div>

    </section>
                
            </div>

            <div class ="partie2">


                    <div class ="sous_partie21">
                        <h1 class ="titre_enjeux">La qualité de l'air extérieur</h1>
                        <p class="text_enjeux">L'air que nous respirons, qu'il s'agisse d'air intérieur ou extérieur, n'est pas forcément sain et non pollué. Un air pollué peut avoir des répercussions sur votre santé, notamment chez les plus sensibles et vulnérables d'entre vous. Ainsi, la qualité de l'air apparaît aujourd'hui comme étant un enjeu majeur de santé publique. Mais au-delà de l'enjeu sanitaire, la qualité de l'air fait également face à des enjeux environnementaux et financiers.</p>
                            
                        <img class="imageEnjeux" src="./Assets/images/new indice.png"  width="520" height="300" >
                        <p class="text_enjeux">La qualité de l’air est un enjeu majeur de santé publique. Ses effets sur la santé sont avérés. Ils peuvent être immédiats ou à long terme (affections respiratoires, maladies cardiovasculaires, cancers…). C’est notamment l’exposition chronique aux particules qui conduit aux effets et donc aux impacts les plus importants pour la santé.</p>

                        <p class="text_enjeux">En octobre 2013, l’Organisation mondiale de la santé a classé la pollution de l’air extérieur comme cancérogène certain pour l’homme.
                                            D’après la dernière estimation publiée par Santé publique France, la pollution aux particules fines PM2,5 est responsable de 48 000 décès par an.
                                            Il existe trois voies de contamination chez l’homme :</p>

                        <p class="text_enjeux">- la voie respiratoire : c’est la principale entrée pour les polluants de l’air ;</p>

                        <p class="text_enjeux">- la voie digestive : les polluants présents dans l’air retombent dans l’eau, sur le sol ou les végétaux et contaminent les produits que l’on ingère (ex. : pesticides, métaux lourds) ;</p>

                        <p class="text_enjeux">- la voie cutanée : elle reste marginale (ex. : éléments toxiques contenus dans certains insecticides).</p>
                    </div>

                    <div class ="sous_partie22">
                        <div class="articles">
                        <h2 class ="titre_liens">Liens utiles</h2>
                        
                        <div class ="Links">
                            
                            <div class="Link1">
                                
                                <a href="https://solidarites-sante.gouv.fr/sante-et-environnement/air-exterieur/qualite-de-l-air-exterieur-10984/" target="_blank" data-extlink rel="noopener noreferrer">
                                - Qualité de l’air extérieur.
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.statistiques.developpement-durable.gouv.fr/bilan-de-la-qualite-de-lair-exterieur-en-france-en-2020" target="_blank" data-extlink rel="noopener noreferrer">
                                 - Bilan de la qualité de l'air extérieur en France en 2020. 
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.who.int/fr/news-room/fact-sheets/detail/ambient-(outdoor)-air-quality-and-health" target="_blank" data-extlink rel="noopener noreferrer">
                                 - Pollution de l’air ambiant (extérieur). 
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.ademe.fr/collectivites-secteur-public/integrer-lenvironnement-domaines-dintervention/qualite-lair-exterieur" target="_blank" data-extlink rel="noopener noreferrer">
                                 - La qualité de l’air, à l’intérieur et à l’extérieur de nos lieux de vie, constitue un enjeu sanitaire majeur.
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.aldes.fr/contenu/nos-conseils/qualite-d-air-et-sante/la-qualite-de-l-air-exterieur-quels-polluants-et-q" target="_blank" data-extlink rel="noopener noreferrer">
                                 - La qualité de l’air extérieur : quels polluants et quelles solutions pour les réduire ?.
                                </a>

                            </div>

                        </div>
                        
                        
                        

                    </div>
                    <div class="videos">
                            
            <h2 class ="titre_liensVideos">Quelques vidéos</h2>
                            
                <div class ="LinksVideo">
                                
                    <div class="Link1Video">                                   
                        <a href="https://www.ethera-labs.com/comment-connaitre-la-qualite-de-lair-exterieur/" target="_blank" data-extlink rel="noopener noreferrer">
                            - Comment connaitre la qualité de l’air extérieur ?.
                        </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://ree.developpement-durable.gouv.fr/themes/risques-nuisances-pollutions/pollution-de-l-air-exterieur/comprendre-les-enjeux-de-la-pollution-de-l-air/article/infographies-et-videos-de-synthese-sur-la-qualite-de-l-air" target="_blank" data-extlink rel="noopener noreferrer">
                        - Infographies et vidéos de synthèse sur la qualité de l’air. 
                    </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://www.youtube.com/watch?v=97sKNU5UKGc" target="_blank" data-extlink rel="noopener noreferrer">
                        - GRAND PRIX UNICLEN 2019 6ÈME ÉDITION - ISPIRA. 
                    </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://www.youtube.com/watch?v=GsLUB1Qvzmk" target="_blank" data-extlink rel="noopener noreferrer">
                        - Wat is vuile lucht?.
                    </a>
                    </div>

                </div>
                                                       
        </div>

    </div>

                    
                </div>

                </div>
<!-- Button commencer le quiz -->
                
    <div class ="container">
        <button class="startbutton" onclick="window.location.href='/quiz4game.php';">Commencer le Quiz</button>
    </div>

                         

            
        
        <?php include_once('./Components/footer.php'); ?>

    <body>

</html>