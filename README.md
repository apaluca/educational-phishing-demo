# Educational Phishing Simulation

This project demonstrates phishing techniques for **educational purposes only** in a controlled environment. Never use for malicious purposes.

## Legal Warning

Using this code for actual phishing attacks is illegal, unethical, violates privacy laws, and carries criminal penalties.

## Setup Instructions

1. Ensure Docker and Docker Compose are installed
2. Run: `docker-compose up -d`
3. Access the phishing page: http://localhost
4. View collected data: http://localhost:8080

## Viewing Collected Data

### Option 1: phpMyAdmin
Access http://localhost:8080

### Option 2: Command Line
```bash
docker exec -it phishing-demo-db-1 bash
mysql -u phishuser -pDeNeSpart123 phishingdb
SELECT * FROM credentials;
```

## Shutdown

```bash
docker-compose down       # Stop containers
docker-compose down -v    # Remove all data
```

## Educational Notes

This simulation demonstrates:
- How phishing pages are structured
- Security vulnerabilities users should be aware of
- The importance of verifying URLs and security indicators

---
