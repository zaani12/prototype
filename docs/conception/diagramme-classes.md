# Diagramme de classe 


## Diagramme de classes pour le Sprint 1 : Gestion de projet solicode

Ce diagramme de classes représente le noyau fonctionnel de l'application, permettant la gestion des projets et des tâches.

**Classes:**

* **Projet (Project):**
    * `id`: Identifiant unique du projet.
    * `nom` (name): Nom du projet.
    * `description`: Description du projet.
    * `objectifs` (objectives): Liste des objectifs du projet.
    * `dateDébut` (startDate): Date de début du projet.
    * `dateÉchéance` (dueDate): Date d'échéance du projet.
    * `statut` (status): Statut du projet (ex : "En cours", "Terminé").
    * `créateur` (creator): Utilisateur ayant créé le projet.
    * `participants` (participants): Liste des utilisateurs participant au projet.
    * `tâches` (tasks): Liste des tâches associées au projet.

* **Tâche (Task):**
    * `id`: Identifiant unique de la tâche.
    * `nom` (name): Nom de la tâche.
    * `description`: Description de la tâche.
    * `priorité` (priority): Priorité de la tâche (ex : "Haute", "Moyenne", "Basse").
    * `dateÉchéance` (dueDate): Date d'échéance de la tâche.
    * `statut` (status): Statut de la tâche (ex : "À faire", "En cours", "Terminée").
    * `assigné` (assignee): Utilisateur assigné à la tâche.
    * `projet` (project): Projet auquel appartient la tâche.
    * `sous-tâches` (subtasks): Liste des sous-tâches associées à la tâche.

* **Utilisateur (User):**
    * `id`: Identifiant unique de l'utilisateur.
    * `nom` (name): Nom de l'utilisateur.
    * `email`: Adresse email de l'utilisateur.
    * `rôle` (role): Rôle de l'utilisateur (ex : "Formateur", "Apprenant").
    * `projetsCréés` (createdProjects): Liste des projets créés par l'utilisateur.
    * `tâchesAssignées` (assignedTasks): Liste des tâches assignées à l'utilisateur.

**Relations:**

* Un projet peut avoir plusieurs tâches associées (`Un Projet a plusieurs Tâches`).
* Une tâche appartient à un seul projet (`Une Tâche appartient à un Projet`).
* Une tâche ne peut être assignée qu'à un seul utilisateur (`Une Tâche a un Assigné`).
* Un utilisateur peut créer plusieurs projets (`Un Utilisateur crée plusieurs Projets`).
* Un utilisateur peut se voir assigné plusieurs tâches (`Un Utilisateur est assigné à plusieurs Tâches`).

**Considérations supplémentaires:**

* **Notifications:** Le système doit envoyer des notifications aux utilisateurs lorsqu'une tâche leur est assignée ou que le statut d'une tâche change.
* **Suivi de l'avancement des tâches:** Le système doit suivre l'avancement de chaque tâche et fournir une représentation visuelle de l'état d'achèvement de la tâche.
* **Interface utilisateur:** L'interface utilisateur doit être intuitive et facile à utiliser pour les formateurs et les apprenants.

La mise en place de ces classes et relations vous permettra de créer une base solide pour les fonctionnalités principales d'une application de gestion de projet solicode. N'oubliez pas de prendre en compte des aspects supplémentaires tels que les notifications, le suivi de l'avancement des tâches et la conception de l'interface utilisateur pour garantir une application complète et conviviale.