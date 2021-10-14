# projet-periode
Réalisé en Symfony 5 et php 8


## Instalation et exécution du projet et des tests phpunit ( unitaires + endpoint d'Api)

# Récup du repository sur github
git clone git@github.com:pierreFranc/projet-periode.git
# Aller sur le projet
cd projet-periode
# Installation des dépendances
symfony composer install
# Lancement du server interne de symfony
symfony server:start -d
# Lancement du service PostgreSql dans un container Dockeer
docker-compose up -d
# Pour l'utilisation d'une base de donnée de test ( phpunit )
APP_ENV=test symfony console doctrine:database:create
APP_ENV=test symfony console doctrine:migrations:migrate -n
# Lancement des tests unitaires et d'API 
symfony php bin/phpunit



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

