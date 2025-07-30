# Student Bio Data Collection Web App

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge\&logo=mysql\&logoColor=white)
![HTML](https://img.shields.io/badge/html-%23E34F26.svg?style=for-the-badge\&logo=html5\&logoColor=white)
![CSS](https://img.shields.io/badge/css-%231572B6.svg?style=for-the-badge\&logo=css3\&logoColor=white)

## 🚀 Overview

**Student Bio Data Collection Web App** is a simple, functional web application designed to collect and display biodata from students. Developed in 2023, this project served as an early hands-on exploration into backend development using PHP and MySQL, coupled with a basic HTML/CSS frontend.

## 🧩 Features

* **User Authentication:**

  * Secure user registration and login
  * Session-based authentication

* **Bio Data Form:**

  * Collects personal, academic, and guardian details

* **Data Display:**

  * Neatly presents submitted biodata for review

* **Session Management:**

  * Maintains login state across pages

* **Password Security:**

  * Hashes passwords before storage

## 🛠 Tech Stack

| Layer          | Technology   |
| -------------- | ------------ |
| Backend        | PHP          |
| Frontend       | HTML, CSS    |
| Database       | MySQL        |
| Authentication | PHP Sessions |

## 📂 Folder Structure

```
├── HTML/                  # UI pages: login, signup, form, and biodata display
├── Includes/              # PHP logic: DB connection, session handling, form logic
├── stylesheet/            # CSS styling files
├── student_bio.sql.gz     # MySQL dump for biodata table
```

## 📦 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/student-biodata-app.git
cd student-biodata-app
```

### 2. Database Setup

* Import the `student_bio.sql.gz` into your MySQL server.
* Edit `Includes/databasehandler.php` with your MySQL credentials.

### 3. Launch the App

* Place the project folder in your web server's root (e.g., `htdocs` in XAMPP).
* Visit `http://localhost/student-biodata-app/HTML/signup_html.php` in your browser.

## 🗓️ How to Use

1. **Sign Up:** Register a new account with a username and password.
2. **Login:** Authenticate with your credentials.
3. **Submit Bio Data:** Complete the biodata form.
4. **View Data:** See your submitted data in a display view.


## 👨‍💻 About the Developers

This project was built through collaboration between:

* **Tunmise Babalola** – Fullstack developer who designed the HTML and CSS structure for the application, ensuring a clean and accessible user interface.
  * [LinkedIn](https://linkedin.com/in/tunmise-babalola-b707212b9/)
  * [Twitter](https://x.com/TunmiseBabs)

* **Samuel Ayomide** – Backend developer responsible for implementing the authentication logic, form handling, session management, and database integration using PHP and MySQL.

  * [LinkedIn](https://linkedin.com/in/samuelayo0507)
  * [Twitter](https://x.com/sam__ayo)


*This project represents a shared effort to explore full-stack web development, combining backend logic with user-friendly interface design. It was a built as a project assignment*
