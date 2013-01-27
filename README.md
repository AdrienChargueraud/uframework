Uframework is a PHP practicals supervised by Julien Muetton and William Durand

Utilisation de uframework :
- Le virtualhost doit pointer sur le dossier /web de uframework. Ce dossier contient un fichier index.php qui permet de lancer l’application (méthode run)
-	Pour permettre la lecture et l’écriture sur le fichier data/Locations.json, il faut lui donner les droits suivant : chmod 644 (ou 666) data/Locations.json

Ce qui a été fait :
-	Le TP2 est terminé. Le GET fonctionne et utilise un fichier JSON pour enregistrer les données
-	Le TP3 est terminé. Il est possible d’utiliser le POST, PUT and DELETE.
-	La partie sur la content-négociation est terminée. Les tests avec curl ont été effectués avec succès. L’application est donc « utilisable » avec du HTML ou du JSON.

Ce qu’il reste à améliorer :
-	La classe Locations.php du modèle est incomplète. Il aurait été judicieux de créer une classe Location.php et ensuite d’avoir une classe Locations.php qui gère une collection de Location. Actuellement, on gère une collection de string.
-	La gestion d’erreur n’est pas totalement terminée
-	Il aurait été préférable d’utiliser le principe de la sérialisation pour enregistrer et charger nos données dans le fichier JSON.
