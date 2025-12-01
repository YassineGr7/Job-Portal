# Job Finder – Laravel Job Portal

A web application built with Laravel that allows job posters to create and manage job listings, and allows users to browse and apply for available positions. The project includes authentication, role-based dashboards, company management, job posting, and rich-text job descriptions.

## Features

### 🟦 **Authentication & Roles**

* Login & registration system.
* Three user roles:

  * **Admin**: manages the entire platform.
  * **Job Poster**: manages company info and creates job offers.
  * **User**: browses jobs and applies.

### 🟩 **Company Management (Job Poster)**

* Upload and display company logo.
* Company dashboard with stats.
* One company per job poster (linked through `user_id`).

### 🟧 **Job Management**

* Create, update, and delete job offers.
* Rich-text job description using **CKEditor**.
* Job categories stored in a dedicated table.
* Job expiration date formatted and saved in database-friendly format.
* Display jobs in a structured table with formatted dates.

### 🟨 **Admin Dashboard**

* Access to all job posters and their companies.
* View and manage all job listings.
* Display custom company logo if available.

### 🟫 **Search & Filtering (User Side)**

* Filter jobs by:

  * Keyword
  * Category
  * Company
  * Job Type
  * City
* Displays a custom message when no results are found.

---

## 🗂️ Technologies Used

* **Laravel 10+**
* **MySQL**
* **Blade Templates**
* **CKEditor 5** for job descriptions
* **Bootstrap 5**
* **Laravel Storage (public disk)** for company logos

---

## ⚙️ Installation

### 1. Clone the project

```bash
git clone https://github.com/YassineGr7/Job-Portal.git
cd job-finder
```

### 2. Install dependencies

```bash
composer install
npm install
npm run dev
```

### 3. Create `.env`

```bash
cp .env.example .env
```

Set up your database credentials.

### 4. Generate app key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Link storage

```bash
php artisan storage:link
```

### 7. Start the server

```bash
php artisan serve
```

---

## 📌 Important Notes

* Company logos are stored in `storage/app/public/logos` and accessed via `asset('storage/...')`.
* Only **job posters** can have companies, so dashboards conditionally load logos.
* CKEditor replaces the job description textarea and supports:

  * Bold
  * Italic
  * Bullets & Numbered lists
  * Headings

---

## 📸 Screenshots (optional)

You can add your future screenshots here:

```
/public/screenshots/img1.png
/public/screenshots/img2.png
/public/screenshots/img3.png
/public/screenshots/img4.png
/public/screenshots/img5.png
/public/screenshots/img6.png
/public/screenshots/img7.png
/public/screenshots/img8.png
/public/screenshots/img9.png
/public/screenshots/img10.png


```

---

## 🧑‍💻 Author

**Yassine Grihim**
Fullstack Developer (PHP/Laravel)
Passionate about building real-world web applications.

