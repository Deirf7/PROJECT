-- Active: 1676454712268@@127.0.0.1@3306

CREATE TABLE projects (
  project_id INT AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(255) NOT NULL,
  project_description TEXT,
  project_start_date DATE NOT NULL,
  project_end_date DATE NOT NULL
);

CREATE TABLE tasks (
  task_id INT AUTO_INCREMENT PRIMARY KEY,
  task_name VARCHAR(255) NOT NULL,
  task_description TEXT,
  task_start_date DATE NOT NULL,
  task_end_date DATE NOT NULL,
  task_status ENUM('open', 'closed') NOT NULL DEFAULT 'open',
  project_id INT NOT NULL,
  FOREIGN KEY (project_id) REFERENCES projects(project_id)
);

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
);

CREATE TABLE project_users (
  project_user_id INT AUTO_INCREMENT PRIMARY KEY,
  project_id INT NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (project_id) REFERENCES projects(project_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);


