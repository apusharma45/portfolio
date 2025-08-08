<?php
include 'db.php';

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
    <link rel="stylesheet" href="styles.css" />
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
            <div class="social-icons">
                <a href="https://github.com/apusharma45" class="social-link" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.42 2.865 8.166 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.013-1.703-2.782.605-3.369-1.342-3.369-1.342-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.608.069-.608 1.004.07 1.532 1.032 1.532 1.032.893 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.34-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.987 1.029-2.688-.103-.253-.446-1.27.098-2.647 0 0 .84-.27 2.75 1.026a9.564 9.564 0 012.5-.336c.85.004 1.705.115 2.5.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.377.202 2.394.1 2.647.64.701 1.028 1.595 1.028 2.688 0 3.848-2.337 4.695-4.566 4.943.36.31.678.923.678 1.86 0 1.343-.012 2.426-.012 2.756 0 .268.18.58.688.48A10.02 10.02 0 0022 12.017C22 6.484 17.523 2 12 2z" />
                    </svg>
                </a>
                <a href="https://linkedin.com/in/apusharma/" class="social-link" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
                <a href="https://facebook.com/apusharma45" class="social-link" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M22.675 0H1.325C.593 0 0 .592 0 1.324v21.352C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.099 2.796.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.764v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.324-.593 1.324-1.324V1.324C24 .592 23.407 0 22.675 0z" />
                    </svg>

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
                    <img src="uploads/profile.jpg"
                        alt="Apu Sharma" class="profile-image" />
                </div>
            </div>
        </section>



        <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Tech Stack:</strong> " . htmlspecialchars($row['tech_stack']) . "</p>";
            echo "<p><strong>Type:</strong> " . htmlspecialchars($row['project_type']) . "</p>";
            echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Project Image' width='200'>";
            echo "<p><a href='" . htmlspecialchars($row['link']) . "' target='_blank'>View Project</a></p>";
            echo "<hr>";
            echo "</div>";
        }
    } else {
        echo "<p>No projects found.</p>";
    }

    $conn->close();
    ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="script.js"></script>
</body>

</html>