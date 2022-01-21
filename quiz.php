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
                <button class="button active1" onclick="window.location.href='quiz.php';">Enjeux</button>
                <button class="button" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                <button class="button" onclick="window.location.href='quiz4.php';">Effets santé</button>
                <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
            </div>

    </section>
                
</div>
            
<div class ="partie2">


    <div class ="sous_partie21">
        
        <h1 class ="titre_enjeux">Les enjeux de la qualité de l'air</h1>
        
        <p class="text_enjeux">L'air que nous respirons, qu'il s'agisse d'air intérieur ou extérieur, n'est pas forcément sain et non pollué. Un air pollué peut avoir des répercussions sur votre santé, notamment chez les plus sensibles et vulnérables d'entre vous. Ainsi, la qualité de l'air apparaît aujourd'hui comme étant un enjeu majeur de santé publique. Mais au-delà de l'enjeu sanitaire, la qualité de l'air fait également face à des enjeux environnementaux et financiers.</p>
        
        <img class="imageEnjeux" src="./Assets/images/5ed8fb16804e1.jpeg"  width="425" height="300" >
                      
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
                        <a href="https://www.anses.fr/fr/content/enjeux-autour-de-la-qualit%C3%A9-de-l%E2%80%99air" target="_blank" data-extlink rel="noopener noreferrer">
                            - Qualité de l’air extérieur. Des impacts sur la santé reconnus.
                        </a>
                    </div>
                    <p>
                    <div class="Link1">
                        <a href="http://www.paca.developpement-durable.gouv.fr/les-enjeux-lies-a-la-qualite-de-l-air-a11765.html" target="_blank" data-extlink rel="noopener noreferrer">
                            - Les enjeux liés à la qualité de l’air. 
                        </a>
                    </div>
                    <p>
                    <div class="Link1">                                   
                    <a href="https://www.nouvelle-aquitaine.ars.sante.fr/qualite-de-lair-un-enjeu-pour-notre-sante" target="_blank" data-extlink rel="noopener noreferrer">
                        - Qualité de l’air, un enjeu pour notre santé. 
                    </a>
                    </div>
                    <p>
                    <div class="Link1">                                   
                    <a href="https://www.atmo-hdf.fr/joomlatools-files/docman-files/Fiches_thematiques/Acc5_EnjeuxCollectivites-min.pdf" target="_blank" data-extlink rel="noopener noreferrer">
                        - Les enjeux de la qualité de l’air pour les collectivités.
                    </a>
                    </div>
                    <p>
                    <div class="Link1">                                   
                    <a href="http://lodel.irevues.inist.fr/pollution-atmospherique/docannexe/file/2518/l220_02_roussel_enjeux_pa.pdf" target="_blank" data-extlink rel="noopener noreferrer">
                        - La qualité de l’air et ses enjeux.
                    </a>
                    </div>
                    <p>
                    <div class="Link1">                                   
                    <a href="http://outil2amenagement.cerema.fr/integrer-les-enjeux-de-qualite-de-l-air-r1226.html" target="_blank" data-extlink rel="noopener noreferrer">
                        - Intégrer les enjeux de qualité de l’air.
                    </a>
                    </div>
                    <p>
                    <div class="Link1">                                   
                    <a href="https://www.atmo-nouvelleaquitaine.org/article/quels-sont-les-enjeux-de-la-qualite-de-lair" target="_blank" data-extlink rel="noopener noreferrer">
                        - Quels sont les enjeux de la qualité de l'air ?.
                    </a>
                    </div>

                </div>
                                                       
        </div>

        <div class="videos">
                            
            <h2 class ="titre_liensVideos">Quelques vidéos</h2>
                            
                <div class ="LinksVideo">
                                
                    <div class="Link1Video">                                   
                        <a href="https://www.youtube.com/watch?v=QY-2TXulvZc" target="_blank" data-extlink rel="noopener noreferrer">
                            - Webinar : Les enjeux liés à la Qualité de l'Air Intérieur (QAI).
                        </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://www.veolia.com/fr/nos-medias/actualites/cop26-transformation-ecologique-au-coeur-lutte-contre-changement-climatique" target="_blank" data-extlink rel="noopener noreferrer">
                        - COP26 : la transformation écologique au coeur de la lutte contre le changement climatique. 
                    </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://www.huffingtonpost.fr/entry/pekin-sous-un-nuage-de-pollution-en-pleine-cop26_fr_61853283e4b0c8666bdbb419" target="_blank" data-extlink rel="noopener noreferrer">
                        - Pékin sous un nuage de pollution en pleine Cop26. 
                    </a>
                    </div>
                    <p>
                    <div class="Link1Video">                                   
                    <a href="https://www.apc-paris.com/actualite/vivez-cop26-linterieur-avec-lapc-son-reseau" target="_blank" data-extlink rel="noopener noreferrer">
                        - Vivez la COP26 de l’intérieur avec l’APC et son réseau.
                    </a>
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