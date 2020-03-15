# ORMphp
ORM en Php pour le cours de BDAA (MASTER1 I2L)

On retrouve dans le projet plusieurs dossiers :

BDAA -> bdd : l'externalisation de la bdd qui a permis de développer l'ORM

BDAA -> script qui se décompose en plusieurs dossiers : 

  - Un "Helper" qui contient la classe "connexionDb" permettant de se connecter à la base de donnée via un objet PDO.

  - Un "Repo" contenant une classe abstraite permettant l'ajout/mises à jour dans la base selon un objet passé en paramètre.
  De supprimer un élément de la base via un objet passé en paramètre, et de supprimer un élément de la base via un identifiant.
  Et enfin de récupérer des informations de la base de données, en passant soit par un identifiant, soit en récupérant la liste complète. 

  - Un "Entity" qui a pour but de définir une "ProductEntity" et sa gestion via des getter/setter.


  - A la racine, on retrouve l'index.php qui permet lorsque l'on décommente les fonctions permet de tester les fonctionnalités intégrées      dans la classe abstraite "ORMRepo".

