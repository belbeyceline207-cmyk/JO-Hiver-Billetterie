# Billetterie JO d'Hiver 2026 — Milano Cortina

## Présentation

Application web de billetterie pour les Jeux Olympiques d'hiver 2026, développée dans le cadre d'un projet universitaire en licence informatique à l'Université Paris-Est Créteil (UPEC).

Ce projet réalisé individuellement avait pour objectif de concevoir une plateforme permettant de consulter les compétitions sportives, de réserver des billets et de gérer les événements depuis un espace organisateur.

## Technologies utilisées

- **Back-end :** PHP, Laravel
- **Base de données :** SQLite, Eloquent ORM
- **Front-end :** HTML, CSS, Bootstrap 5
- **Interface :** Bootstrap Icons, Google Fonts

## Fonctionnalités principales

### Calendrier des compétitions
- Affichage des compétitions regroupées par date
- Filtrage par discipline sportive
- Consultation des lieux, horaires et tarifs
<img width="1343" height="619" alt="image" src="https://github.com/user-attachments/assets/384af506-c151-4e2b-943c-92b63b31040a" />

### Billetterie
- Consultation des compétitions et filtrage par prix
- Gestion d'un panier avec les sessions Laravel
- Formulaire de réservation de plusieurs billets
- Confirmation de réservation avec récapitulatif
<img width="1344" height="629" alt="image" src="https://github.com/user-attachments/assets/8b19aabe-098c-4337-be1d-f816e5713d39" />
<img width="1353" height="588" alt="image" src="https://github.com/user-attachments/assets/0bca76aa-f9ee-4110-833d-5a08c4342833" />
<img width="1342" height="592" alt="image" src="https://github.com/user-attachments/assets/7eecac53-be0e-4fc8-bc7b-5aac903f764c" />


### Espace organisateur
- Authentification des organisateurs
- Création, modification et suppression de compétitions
- Consultation et recherche des réservations
- Statistiques de remplissage et suivi des places disponibles
<img width="1320" height="599" alt="image" src="https://github.com/user-attachments/assets/de138f80-2b43-4caa-8120-ed4a71e05736" />
<img width="1343" height="615" alt="image" src="https://github.com/user-attachments/assets/7761c660-b313-4a55-8243-c3e22653c01e" />

#### Compte de démonstration

| Champ | Valeur |
|-------|--------|
| Email | `organisateur@jo.fr` |
| Mot de passe | `password123` |


## Installation

### Prérequis

- PHP 8.x compatible avec la version de Laravel utilisée
- Composer
- Extension PHP SQLite activée

### Configuration

**1. Cloner le projet**

```bash
git clone https://github.com/belbeyceline207-cmyk/JO-Hiver-Billetterie.git
cd JO-Hiver-Billetterie
```

**2. Installer les dépendances**

```bash
composer install
```

**3. Créer le fichier de configuration**

```bash
cp .env.example .env
php artisan key:generate
```

Configurer la connexion SQLite dans le fichier `.env` et créer le fichier `database/database.sqlite` si nécessaire.

**4. Initialiser la base de données**

```bash
php artisan migrate:fresh --seed
```

Cette commande initialise la base et charge les données de démonstration. Attention : `migrate:fresh` supprime les tables existantes.

**5. Lancer le serveur**

```bash
php artisan serve
```

L'application est accessible à l'adresse : http://127.0.0.1:8000.

## Pages principales

| Page | URL |
|---|---|
| Accueil | `/` |
| Calendrier | `/calendrier` |
| Billetterie | `/billetterie` |
| Connexion organisateur | `/login` |

## Structure du projet

- `app/Http/Controllers/` — gestion des requêtes et de la logique applicative
- `app/Models/` — modèles Eloquent et relations entre les données
- `resources/views/` — interfaces Blade
- `database/migrations/` — définition des tables
- `database/seeders/` — génération des données de démonstration
- `routes/web.php` — définition des routes de l'application

## Compétences développées

Ce projet m'a permis de mettre en pratique plusieurs compétences :

- Développement d'une application web avec le framework Laravel
- Conception et manipulation d'une base de données relationnelle
- Utilisation d'Eloquent ORM et des migrations
- Gestion des formulaires, des sessions et de l'authentification
- Organisation du code selon l'architecture MVC
- Développement autonome d'un projet comportant plusieurs fonctionnalités

## Auteur

**Céline Belbey**

Projet universitaire — Licence 2 Informatique, UPEC — 2025-2026.
