Three-Tier Architecture on AWS

This project implements a scalable and secure Three-Tier Web Application Architecture on Amazon Web Services (AWS).
It consists of Web Tier, Application Tier, and Database Tier, with proper network isolation using VPC, subnets, and security groups.

📌 Architecture Overview
🔹 Web Tier

Public Subnets

EC2 Web Servers

Application Load Balancer

Handles incoming HTTP/HTTPS requests

🔹 Application Tier

Private Subnets

EC2 App Servers

Processes backend logic

Only receives traffic from Web Tier

🔹 Database Tier

Private DB Subnets

Amazon RDS (MySQL/PostgreSQL)

Accessible only from Application Tier

🚀 AWS Services Used

Amazon VPC

Public & Private Subnets

EC2

Application Load Balancer (ALB)

RDS MySQL

S3 Bucket (for static files)

NAT Gateway

IAM Roles
