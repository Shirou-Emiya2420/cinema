# 🎬 Cinema Project

Cinema Project est une application web développée en PHP avec une architecture MVC légère, permettant de gérer une base de données de films, réalisateurs, acteurs, genres et rôles. Ce projet vise à fournir une interface claire à la fois pour les utilisateurs curieux de cinéma et pour les administrateurs chargés de la gestion de contenus.

Le site intègre un panneau d'administration complet pour l'ajout, la modification et la suppression de données. Il s'appuie sur une base de données MySQL pré-remplie (via `bdd_test.sql`) et une interface responsive construite avec UIkit.

---

## 📁 Arborescence

```
cinema/
├── controller/
│   └── CinemaController.php
├── model/
│   └── Connect.php
├── view/
│   ├── detailActeur.php
│   ├── detailFilm.php
│   ├── detailRealisateur.php
│   ├── listFilms.php
│   ├── panneau.php
│   ├── template.php
├── public/ (assets: images, CSS, JS si nécessaire)
├── index.php
└── SQL/
    ├── bdd_test.sql ← à utiliser pour faire fonctionner le site
    ├── base.sql
    ├── remplire.sql
    ├── requet.sql
    └── test.sql
```

---

## ⚙️ Installation

1. **Cloner le projet**
```bash
git clone https://github.com/ton_repo/cinema.git
```

2. **Importer la base de données** dans votre SGBD (phpMyAdmin, Adminer...) :
   - Utiliser **`bdd_test.sql`** pour faire fonctionner le site
   - Les autres fichiers SQL sont destinés à des exercices pédagogiques annexes

3. **Connexion** :
   - Le fichier `Connect.php` est **déjà configuré** pour fonctionner avec `bdd_test.sql`

4. **Lancer le serveur local**
```bash
php -S localhost:8000
```
Puis ouvrir [http://localhost:8000/index.php](http://localhost:8000/index.php)

---

## 🧩 Fonctionnalités

### Utilisateur
- Lister tous les films
- Consulter le détail d’un film
- Accéder à la fiche d’un acteur ou d’un réalisateur

### Administration (Panneau de configuration)
- Ajouter, modifier ou supprimer :
  - Films (avec durée, note, image, genre et réalisateur)
  - Acteurs et réalisateurs (personnes avec date de naissance, image et sexe)
  - Genres de films
  - Rôles attribués aux acteurs

---

## 💡 Technologies utilisées
- **PHP** (avec PDO pour les requêtes sécurisées)
- **MySQL** (base relationnelle optimisée)
- **UIkit** (framework CSS pour une interface moderne)

---

## 📌 Notes supplémentaires
- L'application utilise une structure MVC simple pour séparer les responsabilités (données, logique, interface)
- Les contrôleurs sont centralisés dans `CinemaController.php`
- Les formulaires interagissent directement avec les méthodes du contrôleur via `index.php`
- Toutes les entrées utilisateur sont sécurisées via `filter_input()` pour éviter les injections
- Le fichier principal à importer pour tester le site est `bdd_test.sql`

---

## 📬 Auteur
Charles LINDECKER
Projet développé dans le cadre d'un exercice pratique de gestion de cinémathèque numérique en PHP moderne.

N'hésitez pas à adapter ce projet pour vos propres besoins ou à le faire évoluer vers un back-office plus poussé (authentification, pagination, recherche, etc.).
