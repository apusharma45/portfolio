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
    <link rel="stylesheet" href="styles/styles.css" />
</head>

<body>
    <header class="header">
        <nav class="nav">
            <h1 class="logo">Apu Sharma</h1>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
            </ul>
            <div class="admin-icon-container">
            <a href="admin/login.php" class="admin-link" target="_blank">
                <button class="btn-style"><img src="uploads/admin-icon.svg" alt="Admin" class="btn-icon"></button>
            </a>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <p class="hero-greeting">Hello, I'm Apu</p>
                    <h2 class="hero-title" id="typed-text">
                        <span id="typed"></span>
                    </h2>
                    <p class="hero-subtitle">based in Bangladesh.</p>
                    <button class="resume-btn">Resume</button>
                </div>
                <div class="hero-image">
                    <img src="uploads/profile.jpg" alt="Apu Sharma" class="profile-image" />
                </div>
            </div>
        </section>

    </main>

    <div class="progress-bar-background">
        <div class="progress-bar-container">
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">HTML</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">90%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">CSS</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">80%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">JAVASCRIPT</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">90%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">PHP</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">70%</div>
                </div>

            </div>

        </div>

        <div class="progress-bar-container">
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">HTML</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">90%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">CSS</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">80%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">JAVASCRIPT</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">90%</div>
                </div>

            </div>
            <div class="progress-box">
                <p style="font-size: 20px; font-weight: bold;">PHP</p>
                <div class="progress-bar-box">
                    <div class="progress-bar">
                        <span class="line"></span>
                    </div>
                    <p class="increasing-percentage">0%</p>
                    <div class="total-percentage">70%</div>
                </div>

            </div>

        </div>
    
    </div>

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

    <div class="break"></div>

    <div class="footer">
        <div class="copyright-container">
            <p class="copyright">Copyright©2025-2030</p>
        </div>

        <div class="social-icons">
                <a href="https://github.com/apusharma45" class="social-link" target="_blank">
                    <img src="uploads/github.svg" alt="GitHub">
                </a>
                <a href="https://linkedin.com/in/apusharma/" class="social-link" target="_blank">
                    <img src="uploads/linkedin.svg" alt="Linkedin">
                </a>
                <a href="https://facebook.com/apusharma45" class="social-link" target="_blank">
                    <img src="uploads/facebook.svg" alt="Facebook">

                </a>
            </div>

        <div class="design-container">
            <p class="credit">Designed by Apu Sharma</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="scripts/script.js"></script>
</body>

</html>