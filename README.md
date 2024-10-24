<div style="text-align: center;">
    <h1>Bigscreen Survey</h1>
    <img src="https://github.com/Sekma/bigscreenFrontEnd/blob/main/src/assets/logo(2).png" width="20%" alt=""><br><br>
</div>

## Présentation
Projet de fin d'études à l'École Multimédia à Paris. <br>
Bigscreen Survey est une application web dédiée à la collecte d'informations auprès des utilisateurs de l'application VR Bigscreen. L'objectif est de fournir un sondage en ligne permettant aux utilisateurs de partager leurs avis et préférences concernant les fonctionnalités de l'application. L'application comprend une API REST pour gérer les réponses et une interface d'administration pour la gestion des données.

## Choix Technologiques 

<ul>
    <li>Backend (API) : Laravel est choisi pour sa structure MVC, sa simplicité d'utilisation, et ses fonctionnalités intégrées telles que l'ORM Eloquent et le système de routage, ce qui facilite le développement rapide et la maintenance.</li>
    <li>Base de données : MySQL est sélectionné pour sa fiabilité et sa capacité à gérer des données structurées, ce qui est essentiel pour la gestion des réponses du sondage.</li>
    <li>Frontend (Administration) : Vue.js est privilégié pour sa flexibilité et sa facilité d'intégration avec des APIs REST. Son approche réactive améliore l'expérience utilisateur dans l'interface d'administration. <br>
        <a href="https://github.com/Sekma/bigscreenFrontEnd" target="_blank">Code Frontend (Administration)</a>
    </li>
</ul>

## Liste Fonctionnelle

### Administration

1. Authentification <br>
    o Route : `POST /login` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Authentifier un utilisateur. <br> 
    o Route : `POST /register` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Enregistrer un nouvel utilisateur. <br> 
    o Route : `GET /user` (authentifié) <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Récupérer les informations de l'utilisateur connecté. <br> 
    o Route : `GET /logout` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Déconnecter l'utilisateur. <br> <br> 
   
2. Gestion des questions <br> 
    o Route : `GET /admin_question` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Récupérer toutes les questions du sondage. <br> <br> 

3. Gestion des réponses <br> 
    o Route : `GET /admin_answer` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Récupérer toutes les réponses du sondage. <br> 
    o Route : `GET /admin_statistical/{id}` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Afficher les statistiques des réponses. <br> <br> 

### API Utilisateur 

4. Soumission des réponses <br> 
    o Route : `POST /answer` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Soumettre les réponses d'un utilisateur au sondage. <br> 
    o Route : `GET /answer/{ref}` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Récupérer les réponses d'un utilisateur avec une référence unique. <br> <br> 

5. Gestion des visiteurs <br> 
    o Route : `POST /visitor` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Enregistrer un visiteur. <br> 
    o Route : `DELETE /delete_visitor/{email}` <br> 
      &nbsp;&nbsp;&nbsp; ▪ Fonctionnalité : Supprimer un visiteur par email. <br> 


## Relations:

- **Table visitors** : Contient les informations sur les visiteurs (id, référence, nom, email). 
    - `id` : Identifiant unique.
    - `reference` : Référence unique pour chaque visiteur.
    - `name` : Nom du visiteur.
    - `email` : Email du visiteur (unique).

- **Table questions** : Contient les informations sur les questions (id, corps de la question, type).
    - `id` : Identifiant unique.
    - `type` : Type de la question (ex. choix multiples).
    - `question` : Corps de la question.
    - `choices` : Choix possibles (format JSON).

- **Table answers** : Contient les réponses des utilisateurs, avec des références aux questions.
    - `id` : Identifiant unique.
    - `visitors_id` : Référence à l'identifiant du visiteur (foreign key).
    - `questions_id` : Référence à l'identifiant de la question (foreign key).
    - `answer` : Réponse fournie par le visiteur.

## Statistiques
Utilisez la librairie Chart.js pour afficher les résultats des sondages sous forme de graphiques (Pie, Radar).

## Sécurité
L'application utilise Sanctum pour gérer l'authentification des utilisateurs.

## Fabriqué avec

<div style="text-align: center;">
  <img alt="VSCode" height="50" width="50" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vscode/vscode-original.svg">
  <img alt="Laravel" height="50" width="50" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg">
  <img alt="PHP" height="50" width="50" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg">
  <img alt="MySQL" height="50" width="50" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg">
</div>
<br>
<hr>
    
## Auteur
- Sekma Mohamed Hedi <a href="https://github.com/Sekma">@Sekma<a/>

## Conclusion
Ce projet a été conçu pour répondre aux besoins de Bigscreen tout en respectant les contraintes définies. Les utilisateurs peuvent facilement participer au sondage et l'administrateur peut gérer les réponses efficacement.
