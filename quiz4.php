<!DOCTYPE html>
<html>      

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style_quiz.css">
    <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                        <button class="button" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                        <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                        <button class="button active4" onclick="window.location.href='quiz4.php';">Effets santé</button>
                        <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
                    </div>

                </section>
                
                </div>

                <div class ="partie2">


                    <div class ="sous_partie21">
                        <h1 class ="titre_enjeux">Les enjeux de la qualité de l'air</h1>
                        <p class="text_enjeux">L'air que nous respirons, qu'il s'agisse d'air intérieur ou extérieur, n'est pas forcément sain et non pollué. Un air pollué peut avoir des répercussions sur votre santé, notamment chez les plus sensibles et vulnérables d'entre vous. Ainsi, la qualité de l'air apparaît aujourd'hui comme étant un enjeu majeur de santé publique. Mais au-delà de l'enjeu sanitaire, la qualité de l'air fait également face à des enjeux environnementaux et financiers.</p>
                            
                        <img class="imageEnjeux" src="./Assets/images/fotolia_60227500_s.jpg"  width="425" height="300" >
                        <p class="text_enjeux">La qualité de l’air est un enjeu majeur de santé publique. Ses effets sur la santé sont avérés. Ils peuvent être immédiats ou à long terme (affections respiratoires, maladies cardiovasculaires, cancers…). C’est notamment l’exposition chronique aux particules qui conduit aux effets et donc aux impacts les plus importants pour la santé.</p>

                        <p class="text_enjeux">En octobre 2013, l’Organisation mondiale de la santé a classé la pollution de l’air extérieur comme cancérogène certain pour l’homme.
                                            D’après la dernière estimation publiée par Santé publique France, la pollution aux particules fines PM2,5 est responsable de 48 000 décès par an.
                                            Il existe trois voies de contamination chez l’homme :</p>

                        <p class="text_enjeux">- la voie respiratoire : c’est la principale entrée pour les polluants de l’air ;</p>

                        <p class="text_enjeux">- la voie digestive : les polluants présents dans l’air retombent dans l’eau, sur le sol ou les végétaux et contaminent les produits que l’on ingère (ex. : pesticides, métaux lourds) ;</p>

                        <p class="text_enjeux">- la voie cutanée : elle reste marginale (ex. : éléments toxiques contenus dans certains insecticides).</p>
                    </div>

                    <div class ="sous_partie22">
                        <h2 class ="titre_liens">Liens utiles</h2>
                        
                        <div class ="Links">
                            
                            <div class="Link1">
                                
                                <a href="https://www.nouvelle-aquitaine.ars.sante.fr/system/files/2019-01/EQIS_Pollution_Air_Mortalite_NA_06_2016.pdf" target="_blank" data-extlink rel="noopener noreferrer">
                                - Impact de l’exposition chronique à la pollution de l’air sur la mortalité en Aquitaine.
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.iarc.who.int/wp-content/uploads/2018/07/pr221_F.pdf" target="_blank" data-extlink rel="noopener noreferrer">
                                 - La pollution atmosphérique une des premières causes environnementales de décès par cancer, selon le CIRC. 
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.santepubliquefrance.fr/determinants-de-sante/pollution-et-sante/air/documents/rapport-synthese/impacts-de-l-exposition-chronique-aux-particules-fines-sur-la-mortalite-en-france-continentale-et-analyse-des-gains-en-sante-de-plusieurs-scenarios" target="_blank" data-extlink rel="noopener noreferrer">
                                 - Impacts de l'exposition chronique aux particules fines sur la mortalité en France. 
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.atmo-nouvelleaquitaine.org/sites/aq/files/atoms/files/www.atmo-nouvelleaquitaine.org_enjeuxpollutionair.pdf" target="_blank" data-extlink rel="noopener noreferrer">
                                 - Les enjeux sanitaires, environnementaux et financiers de la pollution de l'air.
                                </a>

                            </div>
                            <p>
                            <div class="Link1">
                                
                                <a href="https://www.notre-environnement.gouv.fr/themes/sante/article/la-pollution-de-l-air-exterieur" target="_blank" data-extlink rel="noopener noreferrer">
                                 - La pollution de l’air extérieur.
                                </a>

                            </div>

                        </div>
                        
                        <div class ="clouds">
                            <i class="fas fa-cloud" style="font-size:20px;color:lightblue;"></i>
                            <i class="fas fa-cloud" style="font-size:34px;color:lightblue;"></i>
                            <i class="fas fa-cloud" style="font-size:45px;color:lightblue;"></i>
                            <i class="fas fa-cloud" style="font-size:50px;color:lightblue;"></i>
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