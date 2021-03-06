# projet-periode
Réalisé en Symfony 5 et php 8


## Instalation et exécution du projet et des tests phpunit ( unitaires + endpoint d'Api)


git clone git@github.com:pierreFranc/projet-periode.git  # Récup du repository sur github

cd projet-periode  # Aller sur le projet

symfony composer install  # Installation des dépendances

symfony server:start -d  # Lancement du server interne de symfony

docker-compose up -d  # Lancement du service PostgreSql dans un container Dockeer

APP_ENV=test symfony console doctrine:database:drop --force
APP_ENV=test symfony console doctrine:database:create  # Pour l'utilisation d'une base de donnée de test ( phpunit )
APP_ENV=test symfony console doctrine:migrations:migrate -n

symfony php bin/phpunit  # Lancement des tests unitaires et d'API 



## Test technique N1: Création d'entités avec 1 méthode métier + test unitaire

1. J'ai réalisé le test sur la dernière version du framework Symfony
2. Tenant compte de vos explications j'ai réalisé la modélisation suivante:
  Une classe Periode est dérivée en PeriodeAbsence et PeriodeMensuelle
  La classe PeriodeAbsence est elle même dérivée en PeriodeAbsenceConge
3. J'ai créé les classes avec le symfony CLI sous forme d'Entities en vue d'un lien avec une base de données.
Voir dans le répertoire src/Entity
4. J'ai volontairement mis la méthode isInclusDansPeriode au niveau de la classe mère Periode afin que toutes les classes dérivées puissent en profiter.
Un refactoring ultérieur pourrait déplacer cette fonctions dans un service puisque cette fonction n'a pas une conotation métier forte.
5. Pour l'instant une période est définie uniquement par le constructeur avec prise en charge d'une Exception.
6. J'ai réalisé et refactoré un test Phpunit dans tests/Entity/PeriodeMensuelleTest.php. 
J'aurais pu faire ce test directement et plus logiquement au niveau de la classe mère Periode.
Le test est fonctionnel avec la commande phpunit: php ./vendor/bin/phpunit 
Il test 9 assertions.
7. J'ai pris le parti d'utiliser le français dans la définition des méthodes, variables et commentaires en adéquation avec l'énnoncé du prototype isInclusDansPeriode.
8. J'ai réalisé ce développement d'une traite d'où le peu de commit...



## Test technique N2: Mise en place d'une Api + test phpunit

1. Création d'une entité PeriodeMensuelleApi sur laquelle je vais me baser pour faire la suite du test.
J'ai posé ce choix suite à des dysfonctionnement qui apparaissent avec ApiPlatform pour le POST sur 
des entités hérités ( l'objet est bien créé en base mais un code d'erreur 500 est renvoyé suite à 
une requete SELECT qui est fait après l'insertion).
2. Dockerisation d'une Base PostgreSql
3. Ajout d'ApiPlatform et définition par annotation du endpoint POST sur l'entité PeriodeMensuelleApi
4. Ajout du test pour l'API endpoint de création d'une PeriodeMensuelleApi


## Test technique N2 bis: Application de l'ApiPlatform avec les entités hérités

Après recherche par curiosité j'ai finalement trouvé le point de blocage dans le mapping d'entités hérités avec ApiPlatform, la mise des id en protected au lieu de private a résolu le probleme. Vu dans plusieurs post sur le web.
J'ai laissé la classe PeriodeMensuelleApi faite au test N2 mais il est plus intéressant de voir les classes PeriodeMensuelle et PeriodeAbsence avec leurs tests respectifs dans le dossier tests/Api.