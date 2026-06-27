#  Casa Tejada - Web-Based Resort Booking and Management System

A web-based reservation and monitoring system designed for **Casa Tejada**, a Singapore-inspired private resort. The platform allows clients to view resort information, check availability, book reservations, and track their booking status in real-time.

##  Features
* Browse resort information and amenities
* View gallery of rooms and facilities
* Submit online reservations
* Track booking status in real-time using a Reference ID
* Contact the resort through the inquiry form

##  Tech Stack
* Frontend: HTML5, CSS3, JavaScript
* Backend: PHP
* Database: MySQL
* Local Server: XAMPP

##  1. Prerequisites & System Requirements

Before installing the system, make sure the following tools are ready on your local machine:

### Software Requirements
* **XAMPP / WAMP / MAMP** (For Apache Web Server and MySQL Database)
* **Web Browser** (Google Chrome, Microsoft Edge, or Mozilla Firefox)
* **Text Editor / IDE** (VS Code, Sublime Text, or Notepad++)
* **PHP Language Support** (PHP version 7.4 or higher)

### Project Structure (Key Files)
* `home.php` - The main landing page of the resort.
* `about.php` - Contains information about the resort.
* `gallery.php` - Visual display of amenities and rooms.
* `contact.php` - Contact details and inquiry form.
* `booking.php` - The reservation form for customers.
* `track.php` - Page to verify and view booking status.

##  2. Comprehensive Installation Guide

Follow these steps to set up the website on your local server:

### Step 1: Setting up Project Files
1. Download or clone this entire repository from GitHub.
2. Locate your local server's directory (usually `C:\xampp\htdocs\` for XAMPP users).
3. Extract or paste the entire `CASA-TEJADA` project folder inside the `htdocs` folder.

### Step 2: Configuring the Database (MySQL)
1. Open your **XAMPP Control Panel** and start **Apache** and **MySQL**.
2. Open your web browser and navigate to: `http://localhost/phpmyadmin/`.
3. Create a new database (e.g., `casatejada_db` or check your configuration file for the exact database name).
4. Click the **Import** tab, choose the `.sql` database backup file located in this repository, and click **Go** to execute and load the tables.

### Step 3: Running the Application
1. To run locally, open your web browser and go to:
   ```text
   http://localhost/CASA-TEJADA/CasaTejada/home.php

##  3. System Features & Usage Instructions

### A. Customer-Facing Features

#### 1. Home and About Exploration (home.php, about.php)
* Usage: Displays the main tagline ("Singapore Inspired Private Resort") and background details of the resort. Users can use the top navigation panel to navigate through pages.

#### 2. Booking a Reservation (booking.php)
* Usage: Customers fill out the input details, including Name, Contact, Date, and Booking Choice. Submitting sends data directly to the database backend.

#### 3. Tracking Reservation Status (track.php)
* Usage: Users input their unique Reference ID to check whether their current resort booking is Pending, Confirmed, or Cancelled.

## 4. System Screenshots

### Home Page Interface
<img width="1918" height="1091" alt="image" src="https://github.com/user-attachments/assets/d1e189aa-0559-486e-9dd9-2dd0bafbf295" />

### Booking Form
<img width="1918" height="1091" alt="image" src="https://github.com/user-attachments/assets/1ffa5187-7058-4f80-9707-fac96d8bc6c7" />

   
