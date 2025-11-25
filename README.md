# Three-Tier Architecture on AWS

This project implements a scalable and secure **three-tier web application architecture** on Amazon Web Services (AWS), consisting of **web, application, and database tiers**.

---

## Architecture Overview

The three-tier architecture separates concerns into distinct layers:

- **Web Tier:** Handles HTTP requests, serves static content, and routes dynamic requests to the application tier.  
- **Application Tier:** Processes business logic and communicates with the database tier.  
- **Database Tier:** Manages data storage and retrieval using MySQL.  

**Architecture Diagram:**  
![Architecture Diagram](./screenshots/daigram.png)

---

## Infrastructure Components

### Networking Setup
The foundation of our architecture is built on a custom VPC with properly segmented subnets:
screenshots/Screenshot 2.png
- VPC Dashboard  
- Resource Map  
- Subnets  
- Route Tables  
- NAT Gateway  

---

### Web Tier Components
The web tier consists of:

- Auto-scaling group of EC2 instances running web servers  
- Internet-facing Application Load Balancer  
- Custom AMI for consistent deployment  

**Screenshots:**  
![Web Tier](./screenshots/1234-1.png)

---

### Application Tier Components
The application tier includes:

- Internal Application Load Balancer  
- Auto-scaling group of application servers  
- Custom AMI with application code  

**Screenshots:**  
![Application Tier](./screenshots/1234-2.png)

---

### Database Tier
The database tier uses Amazon RDS with MySQL:

- RDS Database in private subnets  

**Screenshots:**  
![Database Tier](./screenshots/1234-3.png)

---

### Content Delivery and Storage
For performance and scalability, we implemented:

- CloudFront distribution for content delivery  
- S3 buckets for image storage  

**Screenshots:**  
![Content Delivery](./screenshots/1234-4.png)

---

## Implementation Steps

1. **Network Infrastructure**
   - Created a custom VPC (`mycustomvpc`) with CIDR `10.0.0.0/16`  
   - Configured public and private subnets across two availability zones  
   - Set up route tables with appropriate routes  
   - Created a NAT Gateway for outbound internet access from private subnets  

2. **Database Tier**
   - Launched an RDS MySQL instance (`database-1`) in private subnets  
   - Configured security groups to allow access only from the application tier  
   - Set up the database connection string for application use  

3. **Application Tier**
   - Created a custom AMI (`appserver2ami`) with application code  
   - Configured a launch template (`appserverLT`) for consistent deployments  
   - Set up an internal Application Load Balancer (`appserverASG-1`)  
   - Configured auto-scaling for the application instances  

4. **Web Tier**
   - Created a custom AMI (`webserverAMI`) with web server configuration  
   - Configured a launch template (`webserverLT`) for web instances  
   - Set up an internet-facing Application Load Balancer (`webserverASG-1`)  
   - Configured auto-scaling for the web instances  

5. **Content Delivery**
   - Created S3 buckets for image storage  
   - Implemented image upload functionality  
   - Configured CloudFront distribution (`threetierCDN`) for content acceleration  

---

## Security Considerations

- Database instances are in private subnets with no public access  
- Application tier is behind an internal load balancer  
- Security groups restrict traffic between tiers  
- NAT Gateway provides controlled outbound internet access  

---

## Performance Features

- Auto-scaling groups ensure capacity meets demand  
- Load balancers distribute traffic evenly  
- CloudFront provides global content delivery  
- Multi-AZ deployment ensures high availability  

---

## Usage

The application supports image uploads which are:

- Stored in S3 buckets for durability  
- Metadata is saved in the MySQL database  
- Distributed via CloudFront for fast global access  

---

## Monitoring

All components are configured with appropriate monitoring and logging to ensure operational visibility and quick troubleshooting.

---

## Conclusion

This three-tier architecture on AWS provides a **scalable, secure, and highly available foundation** for web applications, following AWS best practices for cloud infrastructure.

---

## Screenshots Folder

All images should be stored in a folder named `screenshots` in the repository so that they appear correctly in the README.
