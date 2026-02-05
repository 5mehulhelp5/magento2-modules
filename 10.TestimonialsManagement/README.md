# Testimonials Management Module for Magento 2
#### A professional-grade Magento 2 extension developed for managing client testimonials. 
#### This module provides a complete ecosystem consisting of an Admin UI Grid, REST API endpoints, and a custom CLI Import tool.

## 1. Key Features
**Admin CRUD Interface:** Full-featured UI Component grid with filtering, sorting, and mass actions (Delete/Status Update).

**Service Contract Architecture:** Fully decoupled logic using Repositories and Interfaces.

**REST API Support:** Headless-ready endpoints for external integrations.

**Custom CLI Tool:** High-performance command-line utility for bulk data imports.

**Image Management:** Profile picture support with automatic thumbnail generation in the grid.

## 2. REST API Integration
#### The module is "Service Contract" compliant, allowing the Web API Framework to map JSON requests to Data Models automatically.

**Base URL:** POST <your-domain>/rest/V1/testimonial/add

**Auth:** Bearer <admin-token>

### 3. API Endpoints 

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| **GET** | `/rest/V1/testimonial/list` | Returns all active testimonials (SearchCriteria supported). |
| **GET** | `/rest/V1/testimonial/:id` | Returns a single testimonial by ID. |
| **POST** | `/rest/V1/testimonial/add` | Creates or Updates a record (JSON payload). |
| **DELETE** | `/rest/V1/testimonial/:id` | Deletes a record from the database. |

### Sample POST Request Body
{
  "testimonial": {
    "name": "Pankaj Sharma",
    "company_name": "Bitbucket Tech",
    "post": "Senior Magento Developer",
    "message": "This module implementation follows Magento best practices.",
    "status": 1,
    "profile_pic": "avatar.jpg"
  }
}

## 4. Custom CLI Command
The module includes a dedicated console command for high-performance bulk data imports.

#### a. Usage
php bin/magento testimonials:import <file-path>

#### b. Help & Options
To see the command description and argument requirements, run:

php bin/magento testimonials:import --help

## 5. Technical Architecture
**1.Database Schema:** Managed via db_schema.xml (name, company_name, message, post, profile_pic, status).

**2.Service Contracts:** Uses TestimonialRepositoryInterface for Web API Reflection mapping.

**3.UI Component:** Grid built with pankaj_index_listing.xml utilizing mass actions.

## 6. Installation & Setup

**1.Upload:** Copy files to app/code/Pankaj/Testimonials

**2.Execute Commands:** 

###### php bin/magento module:enable Pankaj_Testimonials
###### php bin/magento setup:upgrade
###### php bin/magento setup:di:compile
###### php bin/magento setup:static-content:deploy -f
###### php bin/magento cache:flush