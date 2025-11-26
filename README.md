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

<img width="1920" height="918" alt="Screenshot 1" src="https://github.com/user-attachments/assets/b414c995-b9d6-4a9f-aaa4-caca7c32a932" />
<img width="1920" height="919" alt="Screenshot 2" src="https://github.com/user-attachments/assets/b9a1594a-2e9d-4d7b-adb1-806786484ecc" />
<img width="1920" height="916" alt="Screenshot 3" src="https://github.com/user-attachments/assets/a80c6af3-0da5-455f-b4b1-5625530ac7be" />
<img width="1920" height="903" alt="Screenshot 4" src="https://github.com/user-attachments/assets/3bbdd236-f341-44a4-b7d7-71bd07638d43" />
<img width="1920" height="908" alt="Screenshot 5" src="https://github.com/user-attachments/assets/da518a91-7299-43f6-822e-da8cef68eda7" />











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

<img width="1920" height="906" alt="Screenshot 6" src="https://github.com/user-attachments/assets/b7f982e5-b3f6-4e83-a781-e05408d8a2bb" />
<img width="1920" height="914" alt="Screenshot 7" src="https://github.com/user-attachments/assets/e147ebb5-9dfc-4559-ad68-9c29c498c4db" />
<img width="1920" height="916" alt="Screenshot 8" src="https://github.com/user-attachments/assets/346572c2-43bc-4457-91e2-48bdb2c708a2" />
<img width="1920" height="918" alt="Screenshot 9" src="https://github.com/user-attachments/assets/4c045227-68f2-4ad5-95c8-7659a81dba6d" />









---

### Application Tier Components
The application tier includes:

- Internal Application Load Balancer  
- Auto-scaling group of application servers  
- Custom AMI with application code  

<img width="1920" height="910" alt="Screenshot 10" src="https://github.com/user-attachments/assets/ef135c7d-9c4f-4547-9ec4-6bcda94c23dc" />
<img width="1920" height="906" alt="Screenshot 11" src="https://github.com/user-attachments/assets/e66505d9-6abc-4c40-b172-bb82cd3d3131" />





---

### Database Tier
The database tier uses Amazon RDS with MySQL:

- RDS Database in private subnets  

<img width="1920" height="908" alt="Screenshot 12" src="https://github.com/user-attachments/assets/ba910e4e-edea-4894-9be7-0c44f3b2b011" />



---

### Content Delivery and Storage
For performance and scalability, we implemented:

- CloudFront distribution for content delivery  
- S3 buckets for image storage

<img width="1920" height="906" alt="Screenshot 13" src="https://github.com/user-attachments/assets/779aac71-c285-4037-9ed1-6fb727674738" />
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
