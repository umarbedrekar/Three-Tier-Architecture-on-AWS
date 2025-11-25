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

<img width="1920" height="1080" alt="Screenshot 1" src="https://github.com/user-attachments/assets/81b5276c-90e5-42af-9152-df95fab7aaeb" />
<img width="1920" height="1080" alt="Screenshot 2" src="https://github.com/user-attachments/assets/3567c525-c11f-4368-90e0-8df6b74392a2" />
<img width="1920" height="1080" alt="Screenshot 3" src="https://github.com/user-attachments/assets/8520aa0b-82cb-40ba-b19e-406b4bbe6167" />
<img width="1920" height="1080" alt="Screenshot 4" src="https://github.com/user-attachments/assets/3d490c3b-7fe3-4a0c-9224-a2d112b4d6b3" />
<img width="1920" height="1080" alt="Screenshot 5" src="https://github.com/user-attachments/assets/ec2b802a-5f66-42c3-a61e-77cf64b00142" />






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

<img width="1920" height="1080" alt="Screenshot 6" src="https://github.com/user-attachments/assets/2df7c31a-6b13-4241-9d52-3c979cfdbcef" />
<img width="1920" height="1080" alt="Screenshot 7" src="https://github.com/user-attachments/assets/b454cb49-2d3a-4f1a-bff1-da1d577e3de9" />
<img width="1920" height="1080" alt="Screenshot 8" src="https://github.com/user-attachments/assets/d3df167b-1441-44d8-8a15-43ca3190e451" />
<img width="1920" height="1080" alt="Screenshot 9" src="https://github.com/user-attachments/assets/96da1f93-13b3-4bf3-bb22-b980aaa0c0db" />





---

### Application Tier Components
The application tier includes:

- Internal Application Load Balancer  
- Auto-scaling group of application servers  
- Custom AMI with application code  

<img width="1920" height="1080" alt="Screenshot 10" src="https://github.com/user-attachments/assets/ffc46688-ffa1-4e0a-9b3d-806dbdcfe8fd" />
<img width="1920" height="1080" alt="Screenshot 11" src="https://github.com/user-attachments/assets/0ea64532-d48d-4797-a150-99ad445383f3" />



---

### Database Tier
The database tier uses Amazon RDS with MySQL:

- RDS Database in private subnets  

<img width="1920" height="1080" alt="Screenshot 12" src="https://github.com/user-attachments/assets/b063051c-8726-484f-a0a8-b061fdc4dec3" />


---

### Content Delivery and Storage
For performance and scalability, we implemented:

- CloudFront distribution for content delivery  
- S3 buckets for image storage  

<img width="1920" height="1080" alt="Screenshot 13" src="https://github.com/user-attachments/assets/fab8f169-9693-4dc4-b2a2-148f025f1c54" />
<img width="1920" height="1080" alt="Screenshot 16" src="https://github.com/user-attachments/assets/96c81e44-c976-48a1-83ed-bfb07a018d3e" />
<img width="1920" height="1080" alt="Screenshot 14" src="https://github.com/user-attachments/assets/b323c613-9599-4c7b-93bc-24f9648eca3d" />
<img width="1920" height="1080" alt="Screenshot 15" src="https://github.com/user-attachments/assets/5bbd0663-8670-44f3-a5fc-4458b1812ef8" />






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
