---
layout: default
chapitre: Analyse Techniques
order: 545
---

## Diagramme de classes dynamique pour le Sprint 1 : Gestion de projet solicode

Le diagramme de classes dynamique représente les interactions entre les classes et les changements d'état au cours du processus de gestion de projet et de tâches.

**Classes:**

* **Projet (Project):**
    * `créer` (create): Crée un nouveau projet.
    * `visualiser` (view): Visualise les détails d'un projet.
    * `modifier` (modify): Modifie les informations d'un projet.
    * `supprimer` (delete): Supprime un projet et ses données associées.

* **Tâche (Task):**
    * `créer` (create): Crée une nouvelle tâche dans un projet donné.
    * `assigner` (assign): Assigne une tâche à un utilisateur.
    * `visualiser` (view): Visualise les détails d'une tâche.
    * `modifier` (modify): Modifie les informations d'une tâche.
    * `supprimer` (delete): Supprime une tâche et ses données associées.
    * `marquerCommeTerminée` (markAsComplete): Marque une tâche comme terminée.

* **Utilisateur (User):**
    * `se connecter` (login): Accède à l'application en tant que formateur ou apprenant.
    * `visualiserProjets` (viewProjects): Visualise la liste des projets.
    * `visualiserTâches` (viewTasks): Visualise la liste des tâches assignées.
    * `créerProjet` (createProject): Crée un nouveau projet.
    * `modifierProjet` (modifyProject): Modifie les informations d'un projet.
    * `supprimerProjet` (deleteProject): Supprime un projet.
    * `créerTâche` (createTask): Crée une nouvelle tâche dans un projet.
    * `assignerTâche` (assignTask): Assigne une tâche à un utilisateur.
    * `modifierTâche` (modifyTask): Modifie les informations d'une tâche.
    * `supprimerTâche` (deleteTask): Supprime une tâche.
    * `marquerTâcheCommeTerminée` (markTaskAsComplete): Marque une tâche comme terminée.

**Diagramme de séquence pour la création d'une tâche:**

1. **Utilisateur (User) sélectionne l'option "Créer tâche" dans le projet sélectionné.**
2. **L'application affiche un formulaire de création de tâche.**
3. **L'utilisateur saisit les informations de la tâche (nom, description, priorité, échéance, etc.).**
4. **L'utilisateur sélectionne un ou plusieurs utilisateurs pour assigner la tâche.**
5. **L'application enregistre la nouvelle tâche dans la base de données.**
6. **L'application envoie une notification aux utilisateurs assignés à la tâche.**
7. **La tâche est ajoutée à la liste des tâches du projet.**

**Diagramme de séquence pour la modification d'une tâche:**

1. **L'utilisateur sélectionne une tâche dans la liste des tâches du projet.**
2. **L'application affiche un formulaire de modification de tâche.**
3. **L'utilisateur modifie les informations de la tâche.**
4. **L'utilisateur enregistre les modifications.**
5. **L'application met à jour les informations de la tâche dans la base de données.**
6. **La tâche est mise à jour dans la liste des tâches du projet.**

**Diagramme de séquence pour la suppression d'une tâche:**

1. **L'utilisateur sélectionne une tâche dans la liste des tâches du projet.**
2. **L'application affiche une confirmation de suppression.**
3. **L'utilisateur confirme la suppression.**
4. **L'application supprime la tâche de la base de données.**
5. **La tâche est supprimée de la liste des tâches du projet.**

**Diagramme de séquence pour le marquage d'une tâche comme terminée:**

1. **L'utilisateur sélectionne une tâche dans la liste des tâches du projet.**
2. **L'utilisateur clique sur le bouton "Marquer comme terminée".**
3. **L'application met à jour le statut de la tâche à "Terminée" dans la base de données.**
4. **La tâche est marquée comme terminée dans la liste des tâches du projet.**

Ce diagramme de classes dynamique fournit une représentation plus détaillée des interactions entre les classes et des changements d'état au cours des processus clés de la gestion de projet et de tâches. Il permet de visualiser le flux d'informations et les modifications qui se produisent dans le système en réponse aux actions des utilisateurs.
