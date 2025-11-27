-- Sample Data for Portfolio Database
-- Run this after schema.sql to populate initial data

USE portfolio;

-- Clear existing data to avoid duplicates if re-running
TRUNCATE TABLE projects;
TRUNCATE TABLE skills;

-- Insert sample projects
INSERT INTO projects (title, description, technologies, image_url, project_url, display_order, is_active) VALUES
('E-Interview System', 'A comprehensive web-based platform for conducting remote technical interviews. Features include real-time code collaboration, video conferencing, and automated scoring.', 'PHP,MySQL,JavaScript,WebRTC', '', '#', 1, 1),
('E-Commerce Website', 'A fully functional e-commerce platform with product catalog, shopping cart, user authentication, and secure payment gateway integration.', 'PHP,MySQL,HTML5,CSS3', '', '#', 2, 1),
('Portfolio Website', 'Personal portfolio website showcasing skills and projects. Built with modern responsive design and dynamic content loading.', 'PHP,MySQL,JavaScript', '', '#', 3, 1);

-- Insert sample skills
INSERT INTO skills (category, skill_name, icon, tags, display_order, is_active) VALUES
-- Backend Development
('Backend Development', 'Backend Development', '⚙️', 'PHP,MySQL,Laravel,CodeIgniter,REST API', 1, 1),
-- Frontend Development
('Frontend Development', 'Frontend Development', '🎨', 'HTML5,CSS3,JavaScript,jQuery,Bootstrap', 2, 1),
-- Tools & Others
('Tools & Others', 'Tools & Others', '🚀', 'Git,VS Code,XAMPP/WAMP,Composer', 3, 1);
