CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  blood_group VARCHAR(10),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Example admin
INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$Hq5G8...'); 
-- (We’ll generate hashed password below)
<?php echo password_hash("admin123", PASSWORD_DEFAULT); ?>

CREATE TABLE blood_stock (
  id INT AUTO_INCREMENT PRIMARY KEY,
  blood_group VARCHAR(10) NOT NULL,
  units INT NOT NULL DEFAULT 0,
  last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE blood_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  blood_group VARCHAR(10) NOT NULL,
  units_requested INT NOT NULL,
  status ENUM('Pending','Approved','Rejected') DEFAULT 'Pending',
  requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
