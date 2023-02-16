-- Active: 1676454712268@@127.0.0.1@3306
-- Insérer les données de la table "projects"
INSERT INTO projects (project_name, project_description, project_start_date, project_end_date) VALUES
('Projet A', 'Un projet pour tester la base de données', '2022-01-01', '2022-03-31'),
('Projet B', 'Un projet pour développer une application', '2022-02-01', '2022-06-30'),
('Projet C', 'Un projet pour la refonte d''un site web', '2022-03-01', '2022-05-31');

-- Insérer les données de la table "tasks"
INSERT INTO tasks (task_name, task_description, task_start_date, task_end_date, task_status, project_id) VALUES
('Tâche 1 Projet A', 'Concevoir l''interface utilisateur', '2022-01-01', '2022-01-31', 'open', 1),
('Tâche 1 Projet B', 'Analyser les besoins de l''utilisateur', '2022-02-01', '2022-02-15', 'open', 2),
('Tâche 1 Projet C', 'Faire une étude de marché', '2022-03-01', '2022-03-15', 'open', 3),

-- Insérer les données de la table "users"
INSERT INTO users (username, password, email) VALUES
('user1', 'password1', 'user1@example.com'),
('user2', 'password2', 'user2@example.com'),
('user3', 'password3', 'user3@example.com');

-- Insérer les données de la table "project_users"
INSERT INTO project_users (project_id, user_id) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3);
