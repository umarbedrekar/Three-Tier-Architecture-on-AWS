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

<img width="1920" height="1080" alt="Screenshot (01)" src="https://github.com/user-attachments/assets/f1615cb3-bad8-463d-b4ba-bf4a4e9e62f4" />
<img width="1920" height="918" alt="Screenshot 02" src="https://github.com/user-attachments/assets/dddb62ff-6c8a-4aaf-a118-2cda0ec0bf2c" />
<img width="1920" height="919" alt="Screenshot 03" src="https://github.com/user-attachments/assets/9a4bb90d-97e5-4e65-ac39-47817598da97" />
<img width="1920" height="916" alt="Screenshot 04" src="https://github.com/user-attachments/assets/7f9fa23d-2750-46e7-9405-0d237bdb0f9d" />
<img width="1920" height="903" alt="Screenshot 05" src="https://github.com/user-attachments/assets/cc392c3b-a7bc-4943-9fd0-980c3af4b495" />
















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

<img width="1920" height="908" alt="Screenshot 12" src="https://github.com/user-attachments/assets/6a342992-b419-4771-bea9-7f1b12b8c078" />
<img width="1920" height="906" alt="Screenshot 13" src="https://github.com/user-attachments/assets/5db6ecea-e705-4530-8ba2-9f8ef3b456f9" />
<img width="1920" height="906" alt="Screenshot 11" src="https://github.com/user-attachments/assets/6e598ac8-86be-46cd-bc59-02186d25e8ad" />
<img width="1920" height="910" alt="Screenshot 10" src="https://github.com/user-attachments/assets/9167ef44-6fbe-4ffb-ab7e-fbcd4033894e" />
















---

### Application Tier Components
The application tier includes:

- Internal Application Load Balancer  
- Auto-scaling group of application servers  
- Custom AMI with application code  

<img width="1920" height="914" alt="Screenshot 08" src="https://github.com/user-attachments/assets/5cfd2c72-5b29-4db3-ae8d-179eab1eac0b" />
<img width="1920" height="918" alt="Screenshot 9" src="https://github.com/user-attachments/assets/a8a9fe50-289c-4b6a-8279-5133951d54fc" />







---

### Database Tier
The database tier uses Amazon RDS with MySQL:

- RDS Database in private subnets  

<img width="1920" height="914" alt="Screenshot 08" src="https://github.com/user-attachments/assets/42fd54d7-2e63-44e6-97f7-d1139af81a46" />




---

### Content Delivery and Storage
For performance and scalability, we implemented:

- CloudFront distribution for content delivery  
- S3 buckets for image storage



<img width="1920" height="906" alt="Screenshot 07" src="https://github.com/user-attachments/assets/22d74ebe-8b3b-42dc-adb4-d95557ac8d32" />

<img width="1760" height="1080" alt="Screenshot 16" src="https://github.com/user-attachments/assets/d849f7fd-dd54-41e0-a948-88674653558e" />
<img width="1920" height="980" alt="Screenshot 14" src="https://github.com/user-attachments/assets/cc580ccf-0c24-46f2-ad8e-8afc4f4a90b8" />
<img width="1920" height="982" alt="Screenshot 15" src="https://github.com/user-attachments/assets/d21817d4-429c-4353-ac17-14828e31c8d7" />













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
