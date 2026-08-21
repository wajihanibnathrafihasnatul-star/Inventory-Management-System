# Security Threat Analysis

## 1. SQL Injection

### Threat
SQL Injection can occur when user input is directly included in SQL queries. An attacker may manipulate the query and access or modify database information.

### Protection
Prepared statements are used in the Add, Edit, and Delete operations. User input is passed as parameters instead of being directly inserted into SQL queries.

## 2. Cross-Site Scripting (XSS)

### Threat
XSS can occur when untrusted user input is displayed directly on a web page. An attacker could insert malicious HTML or JavaScript.

### Protection
`htmlspecialchars()` is used when displaying product information so that HTML and JavaScript are treated as text.

## 3. Invalid Input

### Threat
Users may enter empty, negative, or invalid values for product quantity and price.

### Protection
Server-side validation checks product name, quantity, and price before database operations.

## 4. Database Credentials

### Threat
Database credentials should not be exposed publicly because they can allow unauthorized database access.

### Protection
Database connection information is kept in the database connection file and should not be exposed in the public repository in a real deployment environment. Production credentials should be stored securely using environment variables or hosting secrets.

## 5. Unauthorized Access

### Threat
Without authentication, anyone who can access the application may be able to add, edit, or delete products.

### Protection
For a production version, user authentication and role-based authorization should be added so that only authorized users can modify inventory data.

## Conclusion

The system applies prepared statements, output escaping, input validation, and safer database operations to reduce common web application security risks.
