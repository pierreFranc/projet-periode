# projet-periode

Explications sur le traitement du test technique:

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

