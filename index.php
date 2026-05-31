<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artha - Financial Management Made Easy</title>
    <link rel="stylesheet" href="assets/css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    
        <nav>
            <div class="logo">
                <h1><i class="fas fa-piggy-bank"></i> Artha</h1>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="auth/login.php" class="btn btn-outline">Login</a></li>
                    <li><a href="auth/register.php" class="btn btn-primary">Get Started</a></li>    
                </ul>
            </div>
        </nav>
    

    <section class="hero-section" id="home">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1>Welcome to Artha</h1>
                <p class="hero-subtitle">Your financial companion for a better future.</p>
                <p class="hero-description">Take control of your money and track your expenses with ease. Manage your budget effectively and achieve your financial goals.</p>
                <div class="hero-buttons">
                    <a href="auth/register.php" class="btn btn-primary btn-lg">Start Tracking Now</a>
                    <a href="#features" class="btn btn-secondary btn-lg">Learn More</a>
                </div>
            </div>
            <div class="hero-illustration">
                <div class="floating-card card-1">
                    <div class="card-icon"><i class="fas fa-wallet"></i></div>
                    <div class="card-text">Balance</div>
                </div>
                <div class="floating-card card-2">
                    <div class="card-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="card-text">Growth</div>
                </div>
                <div class="floating-card card-3">
                    <div class="card-icon"><i class="fas fa-piggy-bank"></i></div>
                    <div class="card-text">Savings</div>
                </div>
            </div>
        </div>
    </section>
 
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Powerful Features</h2>
                <p>Everything you need to manage your finances</p>
            </div>

            <div class="feature-grid">
               <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Expense Tracking</h3>
                    <p>Track your expenses and manage your budget effectively with real-time updates.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3>Financial Categories</h3>
                    <p>Organize your expenses into meaningful categories for better insights.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>Dashboard Overview</h3>
                    <p>Get a comprehensive summary of your balance and spending patterns.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3>Transaction History</h3>
                    <p>View and manage all transactions with complete details and filters.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="preview" id="preview">
        <div class="container">
            <h2>Preview</h2>
            <img src="assets/images/preview.png" alt="App Preview">
        </div>
    </section>

     <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>About Artha</h2>
                    <p>Artha is a modern web application designed to help users manage their finances efficiently and effectively.</p>
                    <p>Our mission is to make financial management simple, accessible, and intuitive for everyone, regardless of their financial expertise.</p>
                    <ul class="about-list">
                        <li><i class="fas fa-check-circle"></i> Simple and intuitive interface</li>
                        <li><i class="fas fa-check-circle"></i> Real-time expense tracking</li>
                        <li><i class="fas fa-check-circle"></i> Detailed financial insights</li>
                        <li><i class="fas fa-check-circle"></i> Secure and private</li>
                    </ul>
                </div>
                <div class="about-visual">
                    <div class="about-card">
                        <div class="card-stat">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Active Users</div>
                        </div>
                    </div>
                    <div class="about-card">
                        <div class="card-stat">
                            <div class="stat-number">$5M</div>
                            <div class="stat-label">Tracked Expenses</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to take control of your finances?</h2>
                <p>Join thousands of users who are already managing their money better with Artha</p>
                <div class="cta-buttons">
                    <a href="auth/register.php" class="btn btn-primary btn-lg">Get Started Free</a>
                    <a href="auth/login.php" class="btn btn-outline btn-lg">I Already Have Account</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Artha</h3>
                <p>Your financial management companion</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="social-media">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Artha. All rights reserved.</p>
        </div>
    </footer>
        
</body>
</html>
