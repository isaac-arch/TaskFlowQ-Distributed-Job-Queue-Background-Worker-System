# TechFlow Pro - Fully Inline Version

## Description
TechFlow Pro is a full-featured project management system built fully inline with HTML, CSS, JS, PHP, and MySQL. 
It supports multi-role access (Admin, Project Manager, Developer), task management, Kanban boards, bug tracking, sprints, activity logs, and reports.

## Features
- Multi-role login and registration
- Projects creation and management
- Task management with status (To Do, In Progress, Done)
- Inline Kanban board simulation
- Bug reporting and tracking
- Sprint creation and tracking
- Admin dashboard with user management
- Activity logs and reports
- Fully inline CSS and JS, no external files
- Ready for XAMPP (localhost) deployment

## Installation & Setup
1. Install **XAMPP** and start **Apache** and **MySQL**.
2. Create a database using `database.sql`:
   - Open `phpMyAdmin`
   - Import `database.sql` file
3. Copy all project files into `htdocs/techflow_pro`
4. Update database credentials in `config/db.php` if necessary
5. Open browser and go to `http://localhost/techflow_pro/index.php`
6. Register as Admin, Project Manager, or Developer to start using the system

## Notes
- All pages are inline CSS/JS; edit HTML files directly to change styles.
- Default roles:
  - Admin = ID 1
  - Project Manager = ID 2
  - Developer = ID 3
- All PHP pages use **sessions** for authentication.