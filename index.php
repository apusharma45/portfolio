<?php
include 'admin/db.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Apu Sharma - Web Developer</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles/styles.css" />
</head>

<body>
    <header class="header">
        <nav class="nav">
            <h1 class="logo">Apu Sharma</h1>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#education" class="nav-link">Education</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#socials" class="nav-link">Socials</a></li>
            </ul>
            <div class="admin-icon-container">
                <a href="admin/login.php" class="admin-link" target="_blank">
                    <button class="btn-style"><img src="uploads/admin-icon.svg" alt="Admin" class="btn-icon"></button>
                </a>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="hero" id="home">
            <div class="hero-content">
                <div class="hero-text">
                    <p class="hero-greeting">Hello, I'm Apu</p>
                    <h2 class="hero-title" id="typed-text">
                        <span id="typed"></span>
                    </h2>
                    <p class="hero-subtitle">based in Bangladesh.</p>
                    <a href="resume/as_resume.pdf" download class="resume-btn">Resume</a>
                </div>
                <div class="hero-image">
                    <img src="uploads/profile.jpg" alt="Apu Sharma" class="profile-image" />
                </div>
            </div>
        </section>

    </main>

    <section id="about" class="about-section">
        <div class="about-container">
            <h2 class="section-heading">About Me</h2>
            <p>
                Hi, I'm Apu Sharma, a web developer based in Bangladesh. I specialize in creating modern,
                responsive, and user-friendly web applications using HTML, CSS, JavaScript, PHP, and frameworks like
                React.js, Laravel, Node.js, and Tailwind CSS.
            </p>
            <p>
                In addition to coding, I have strong problem-solving skills and enjoy tackling challenging programming
                tasks. I am passionate about learning new technologies and continuously improving my skills to deliver
                innovative and efficient solutions in web development.
            </p>
        </div>
    </section>

    <section id="education" class="education-section">
        <div class="education-container">
            <h2 class="section-heading">Education</h2>

            <div class="education-item">
                <h3 class="education-degree">Bachelor of Science in Computer Science & Engineering</h3>
                <p class="education-institution">Khulna University of Engineering and Technology, Khulna, Bangladesh</p>
                <p class="education-year">2022 – 2027</p>
                <p class="education-details">
                    Focusing on software engineering, web development, and data structures.
                    Doing projects on full-stack development, database design, and algorithms.
                </p>
            </div>

            <div class="education-item">
                <h3 class="education-degree">Higher Secondary Certificate (Science)</h3>
                <p class="education-institution">Police Lines School and College, Rangpur, Bangladesh</p>
                <p class="education-year">2019 – 2021</p>
                <p class="education-details">
                    Studied Physics, Chemistry, Mathematics, and ICT, building a strong foundation for computer science.
                </p>
            </div>
        </div>
    </section>




    <!-- Skills Section -->
    <section id="skills" class="skills-section">
        <h2 class="section-heading">My Skills</h2>

        <div class="progress-bar-background">
            <!-- First Container: Languages -->
            <div class="progress-bar-container">
                <h3 class="skills-subheading">Languages</h3>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-html5"></i> HTML</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">90%</div>
                    </div>
                </div>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-css3-alt"></i> CSS</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">80%</div>
                    </div>
                </div>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-js"></i> JavaScript</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">90%</div>
                    </div>
                </div>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-php"></i> PHP</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">85%</div>
                    </div>
                </div>
            </div>


            <div class="progress-bar-container">
                <h3 class="skills-subheading">Frameworks</h3>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-react"></i> React.js</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">85%</div>
                    </div>
                </div>

                <div class="progress-box">
                    <p class="skill-name">
                        <img src="uploads/laravel_icon.svg" alt="Laravel" style="width:20px;height:20px;"> Laravel
                    </p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">88%</div>
                    </div>
                </div>


                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-node-js"></i> Node.js</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">82%</div>
                    </div>
                </div>

                <div class="progress-box">
                    <p class="skill-name"><i class="fab fa-css3-alt"></i> Tailwind CSS</p>
                    <div class="progress-bar-box">
                        <div class="progress-bar"><span class="line"></span></div>
                        <p class="increasing-percentage">0%</p>
                        <div class="total-percentage">90%</div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id="projects" class="projects-section">
        <h2 class="section-heading">My Projects</h2>

        <div class="projects-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='project-card'>";
                    echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Project Image' class='project-image' width='200'>";
                    echo "<div class='project-info'>";
                    echo "<h2 class='project-title'>" . htmlspecialchars($row['title']) . "</h2>";
                    echo "<p class='project-description'>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><strong>Tech Stack:</strong> " . htmlspecialchars($row['tech_stack']) . "</p>";
                    echo "<p><strong>Type:</strong> " . htmlspecialchars($row['project_type']) . "</p>";
                    echo "<a href='" . htmlspecialchars($row['link']) . "' class='project-link' target='_blank'>View Project</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>


    <div class="break"></div>

    <div class="footer" id="socials">
        <div class="footer-container">
            <p class="copyright">© 2025-2030 Apu Sharma</p>
            <div class="social-icons">
                <a href="https://github.com/apusharma45" class="social-link" target="_blank">
                    <img src="uploads/github.svg" alt="GitHub">
                </a>
                <a href="https://linkedin.com/in/apusharma/" class="social-link" target="_blank">
                    <img src="uploads/linkedin.svg" alt="LinkedIn">
                </a>
                <a href="https://facebook.com/apusharma45" class="social-link" target="_blank">
                    <img src="uploads/facebook.svg" alt="Facebook">
                </a>
            </div>
            <p class="credit">Designed by Apu Sharma</p>
        </div>
    </div>


    <div id="contact-feedback" class="contact-feedback"></div>

    <div class="contact-container">
        <button id="contact-btn" class="contact-btn" aria-label="Contact Me">💬</button>

        <div id="contact-form" class="contact-form" aria-hidden="true">
            <h3>Contact Me</h3>
            <form action="send_message.php" method="POST" autocomplete="on">

                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="send-btn">Send</button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="scripts/script.js"></script>
</body>

</html>