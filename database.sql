CREATE DATABASE techflow_inline;
USE techflow_inline;

CREATE TABLE roles (
 id INT AUTO_INCREMENT PRIMARY KEY,
 role_name VARCHAR(50)
);
INSERT INTO roles (role_name) VALUES ('Admin'),('Project Manager'),('Developer');

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 fullname VARCHAR(100),
 email VARCHAR(100),
 password VARCHAR(255),
 role_id INT,
 FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE projects (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 description TEXT,
 created_by INT,
 FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE project_members (
 id INT AUTO_INCREMENT PRIMARY KEY,
 project_id INT,
 user_id INT,
 FOREIGN KEY (project_id) REFERENCES projects(id),
 FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks (
 id INT AUTO_INCREMENT PRIMARY KEY,
 project_id INT,
 title VARCHAR(100),
 description TEXT,
 assigned_to INT,
 status ENUM('To Do','In Progress','Done') DEFAULT 'To Do',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (project_id) REFERENCES projects(id),
 FOREIGN KEY (assigned_to) REFERENCES users(id)
);

CREATE TABLE bugs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 task_id INT,
 reported_by INT,
 description TEXT,
 status ENUM('Open','In Progress','Closed') DEFAULT 'Open',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (task_id) REFERENCES tasks(id),
 FOREIGN KEY (reported_by) REFERENCES users(id)
);

CREATE TABLE sprints (
 id INT AUTO_INCREMENT PRIMARY KEY,
 project_id INT,
 name VARCHAR(100),
 start_date DATE,
 end_date DATE,
 FOREIGN KEY (project_id) REFERENCES projects(id)
);

CREATE TABLE activity_logs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT,
 action TEXT,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (user_id) REFERENCES users(id)
);