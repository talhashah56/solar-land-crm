# SOLAR LAND CRM System

A simple web-based **Client Management and Follow-Up System** built for managing daily sales and client tracking activities for SOLAR LAND.

This system allows staff to store client details, track follow-ups, manage payment status, and maintain communication records efficiently.

---

## Features

- Add new client records
- Update existing client information
- Delete client records
- Track:
  - Client Name
  - Contact Number
  - Total Payment
  - Status (Pending / Completed / Cancelled)
  - Last Call Date
  - Call Status
  - Next Follow-Up Date
  - Notes
- Print full client report
- Clean and responsive UI
- Built using PHP & MySQL (no framework)

---

## Tech Stack

- Frontend: HTML, CSS
- Backend: PHP
- Database: MySQL
- Server: Apache (XAMPP recommended)

---

## Installation Guide

### 1. Clone Repository
```bash
git clone https://github.com/your-username/solarland-crm-system.git



Start XAMPP
Apache
MySQL


Create Database 
solarland_db


SQL CODE:
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100),
    contact_no VARCHAR(20),
    total_payment DECIMAL(10,2),
    status VARCHAR(50),
    last_call_date DATE,
    call_status VARCHAR(50),
    next_followup_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




Folder:

solarland-crm-system/
│
├── index.php
├── edit.php
├── delete.php
├── print.php
├── db.php
├── style.css
├── edit.css





