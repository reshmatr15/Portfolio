<?php
require_once 'php/config.php';
$csrfToken = generateCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional Portfolio - Web Developer & Designer">
    <title>My Portfolio | Web Developer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-brand">
                <span class="logo-text">Portfolio</span>
            </div>
            <button class="mobile-toggle" id="mobileToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Hi, I'm <span class="gradient-text">Reshma T R</span>
                </h1>
                <p class="hero-subtitle">
                    <span id="typedText"></span><span class="cursor">|</span>
                </p>
                <p class="hero-description">
                    Experienced PHP Developer with 3 years of expertise in building scalable web applications.
                </p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">View My Work</a>
                    <a href="#contact" class="btn btn-secondary">Get In Touch</a>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="mouse"></div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <div class="about-content">
                <div class="about-image">
                    <div class="image-placeholder">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="100" cy="100" r="80" fill="url(#gradient1)"/>
                            <defs>
                                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="about-text">
                    <h3>PHP Developer</h3>
                    <p>
                        I am an experienced PHP developer with 3 years of hands-on experience in developing dynamic websites and web applications.
                        I hold a B.Tech in Computer Science, which has provided me with a strong theoretical foundation to complement my practical skills.
                    </p>
                    <p>
                        My expertise lies in building robust back-end systems, integrating databases, and creating seamless user experiences.
                        I am passionate about writing clean, efficient code and solving complex problems.
                    </p>
                    <div class="about-stats">
                        <div class="stat-item">
                            <h4>3+</h4>
                            <p>Years Experience</p>
                        </div>
                        <div class="stat-item">
                            <h4>10+</h4>
                            <p>Projects Completed</p>
                        </div>
                        <div class="stat-item">
                            <h4>B.Tech</h4>
                            <p>Computer Science</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills">
        <div class="container">
            <h2 class="section-title">My Skills</h2>
            <p class="section-subtitle">Technologies and tools I work with</p>
            <div class="skills-grid">
                <div class="skill-card">
                    <div class="skill-icon">🎨</div>
                    <h3>Frontend Development</h3>
                    <div class="skill-tags">
                        <span class="tag">HTML5</span>
                        <span class="tag">CSS3</span>
                        <span class="tag">JavaScript</span>
                        <span class="tag">React</span>
                        <span class="tag">Vue.js</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">⚙️</div>
                    <h3>Backend Development</h3>
                    <div class="skill-tags">
                        <span class="tag">PHP</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">REST API</span>
                        <span class="tag">Laravel</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🎯</div>
                    <h3>Design & UX</h3>
                    <div class="skill-tags">
                        <span class="tag">Figma</span>
                        <span class="tag">Adobe XD</span>
                        <span class="tag">Responsive Design</span>
                        <span class="tag">UI/UX</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🚀</div>
                    <h3>Tools & Others</h3>
                    <div class="skill-tags">
                        <span class="tag">Git</span>
                        <span class="tag">Docker</span>
                        <span class="tag">VS Code</span>
                        <span class="tag">Webpack</span>
                        <span class="tag">npm</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <p class="section-subtitle">Some of my recent work</p>
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            <a href="#" class="project-link">View Project →</a>
                        </div>
                    </div>
                    <div class="project-info">
                        <h3>E-Commerce Platform</h3>
                        <p>A full-featured online shopping platform with payment integration and admin dashboard.</p>
                        <div class="project-tech">
                            <span>PHP</span>
                            <span>MySQL</span>
                            <span>JavaScript</span>
                        </div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            <a href="#" class="project-link">View Project →</a>
                        </div>
                    </div>
                    <div class="project-info">
                        <h3>Portfolio Website</h3>
                        <p>Modern and responsive portfolio website with smooth animations and contact form.</p>
                        <div class="project-tech">
                            <span>HTML</span>
                            <span>CSS</span>
                            <span>JavaScript</span>
                        </div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            <a href="#" class="project-link">View Project →</a>
                        </div>
                    </div>
                    <div class="project-info">
                        <h3>Task Management App</h3>
                        <p>Collaborative task management application with real-time updates and team features.</p>
                        <div class="project-tech">
                            <span>React</span>
                            <span>Node.js</span>
                            <span>MongoDB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">Let's work together on your next project</p>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <div>
                            <h4>Email</h4>
                            <p>your.email@example.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📱</div>
                        <div>
                            <h4>Phone</h4>
                            <p>+1 (123) 456-7890</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div>
                            <h4>Location</h4>
                            <p>Your City, Country</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link" title="GitHub">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" title="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <form id="contactForm" class="contact-form">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <span class="btn-text">Send Message</span>
                        <span class="btn-loading" style="display: none;">Sending...</span>
                    </button>
                    <div id="formMessage" class="form-message"></div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Your Name. All rights reserved.</p>
            <p>Built with ❤️ using HTML, CSS, and PHP</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
