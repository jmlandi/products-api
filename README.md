# Products API - Technical Assessment

![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

This is a Laravel-based Products API built for technical evaluation. The application uses Docker for containerization and includes a complete development environment.

## 🏗️ Architecture

- **API Server**: Laravel 12 with PHP 8.4
- **Database**: PostgreSQL 16
- **Queue System**: AWS SQS integration
- **Scheduler**: Laravel task scheduling
- **Containerization**: Docker & Docker Compose

## 🚀 Quick Start

### Prerequisites
- Docker & Docker Compose installed
- Git

### Setup (One Command)
```bash
./docker-setup.sh
```

### Manual Setup
```bash
# Clone and navigate
git clone <repository-url>
cd products-api

# Start services
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate

# Generate app key
docker-compose exec app php artisan key:generate
```

## 🌐 Access Points

- **API Endpoint**: http://localhost:8000
- **Database**: localhost:5432
  - Database: `products_api`
  - Username: `products_user`
  - Password: `products_password`

## 📋 API Documentation

### Available Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/api/products` | List all products |
| POST   | `/api/products` | Create a new product |
| GET    | `/api/products/{id}` | Get product details |
| PUT    | `/api/products/{id}` | Update a product |
| DELETE | `/api/products/{id}` | Delete a product |

### Authentication
Include the API token in your requests:
```bash
curl -H "Authorization: Bearer YOUR_API_TOKEN" http://localhost:8000/api/products
```

## 🔧 Development Commands

```bash
# View all services status
docker-compose ps

# View logs
docker-compose logs -f [service_name]

# Run artisan commands
docker-compose exec app php artisan <command>

# Run tests
docker-compose exec app php artisan test

# Access database
docker-compose exec postgres psql -U products_user -d products_api

# Scale queue workers
docker-compose up -d --scale queue=3

# Rebuild services
docker-compose build --no-cache
```

## 🧪 Testing

Run the test suite:
```bash
docker-compose exec app php artisan test
```

## 📊 Key Features Demonstrated

- **RESTful API Design**: Clean, resource-based endpoints
- **Database Design**: Proper relationships and migrations
- **Queue Processing**: Background job handling with SQS
- **Task Scheduling**: Automated maintenance tasks
- **Docker Containerization**: Production-ready setup
- **Error Handling**: Proper exception handling and responses
- **Data Validation**: Request validation and sanitization

## 🔄 Background Services

### Queue Worker
Processes background jobs for:
- Product image processing
- Bulk operations
- Email notifications
- Data synchronization

### Scheduler
Runs automated tasks:
- Data cleanup
- Report generation  
- Cache warming
- Health checks

## 🛠️ Configuration

### Environment Variables
Key configuration in `.env`:
- Database connection settings
- AWS SQS credentials
- API authentication tokens
- Cache and session drivers

### AWS SQS Setup
For queue functionality, configure:
```env
QUEUE_CONNECTION=sqs
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
SQS_QUEUE=your-queue-name
```

## 🏁 Stopping the Application

```bash
# Stop all services
docker-compose down

# Stop and remove volumes (clean slate)
docker-compose down -v
```

## 📝 Technical Notes

- Uses Laravel 12 with modern PHP 8.4 features
- PostgreSQL 16 for robust data storage
- Supervisor for process management
- Apache with mod_rewrite enabled
- Optimized for both development and production
- Health checks ensure service reliability

## 🎯 Evaluation Criteria

This setup demonstrates:
- **Code Quality**: Clean, well-structured Laravel code
- **Architecture**: Proper separation of concerns
- **DevOps Skills**: Docker containerization and orchestration
- **Database Design**: Efficient schema and relationships
- **API Design**: RESTful principles and documentation
- **Testing**: Comprehensive test coverage
- **Production Readiness**: Scalable, maintainable setup
