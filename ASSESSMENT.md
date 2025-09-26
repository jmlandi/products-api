# Technical Assessment - Products API

## 📋 Instructions for Candidates

Thank you for taking the time to complete this technical assessment. This project is a Laravel-based Products API that demonstrates various backend development skills.

## 🎯 What We're Evaluating

### 1. **Docker & DevOps Skills**
- Understanding of containerization
- Docker Compose orchestration
- Service dependencies and health checks

### 2. **Laravel Framework Knowledge**
- MVC architecture implementation
- Eloquent ORM usage
- Middleware and request handling
- Job queues and task scheduling

### 3. **API Design**
- RESTful endpoint structure
- Request validation
- Error handling and responses
- Authentication implementation

### 4. **Database Skills**
- Migration design
- Model relationships
- Query optimization
- Data integrity

### 5. **Code Quality**
- Clean, readable code
- Proper documentation
- Testing coverage
- SOLID principles

## 🚀 Getting Started

### 1. Environment Setup
```bash
# Clone the repository
git clone <repository-url>
cd products-api

# Quick setup (recommended)
./docker-setup.sh

# Or manual setup
docker-compose up -d
docker-compose exec app php artisan migrate
docker-compose exec app php artisan key:generate
```

### 2. Verify Installation
- API: http://localhost:8000
- Database: localhost:5432 (products_api/products_user/products_password)

### 3. Run Tests
```bash
docker-compose exec app php artisan test
```

## 📝 Assessment Tasks

### Task 1: API Implementation ⭐
Review the existing API endpoints and ensure they follow RESTful principles:
- Products CRUD operations
- Proper HTTP status codes
- Request validation
- Error handling

### Task 2: Database Design ⭐⭐
Examine the database schema:
- Are the relationships properly defined?
- Is the schema normalized?
- Are indexes optimized for queries?

### Task 3: Background Jobs ⭐⭐
Understand the queue system:
- How are jobs structured?
- What happens on job failure?
- How would you monitor job processing?

### Task 4: Testing ⭐⭐⭐
Review and extend the test suite:
- Unit tests for models and services
- Feature tests for API endpoints
- Integration tests for complex workflows

### Task 5: Performance ⭐⭐⭐
Identify potential performance improvements:
- Database query optimization
- Caching strategies
- API response optimization

## 🔍 Code Review Points

### Look for:
- ✅ Consistent code formatting
- ✅ Proper error handling
- ✅ Security best practices
- ✅ Documentation quality
- ✅ Test coverage
- ✅ Performance considerations

### Red flags:
- ❌ SQL injection vulnerabilities
- ❌ Missing validation
- ❌ Poor error messages
- ❌ Hardcoded values
- ❌ No tests
- ❌ Memory leaks

## 📊 Submission Guidelines

### What to Include:
1. **Code Review**: Document any issues found and fixes applied
2. **Architecture Notes**: Explain key design decisions
3. **Performance Analysis**: Identify bottlenecks and solutions
4. **Testing Report**: Coverage analysis and test results
5. **Documentation**: Any improvements or clarifications added

### Deliverables:
- [ ] Updated codebase (if changes were made)
- [ ] Technical documentation
- [ ] Test results
- [ ] Performance recommendations
- [ ] Security assessment

## ⏱️ Time Expectations

- **Initial Setup**: 15-30 minutes
- **Code Review**: 2-3 hours
- **Documentation**: 1-2 hours
- **Total**: 3-5 hours

## 🆘 Support

If you encounter any issues:
1. Check the `docker-compose logs -f` output
2. Verify Docker is running and has sufficient resources
3. Ensure ports 8000 and 5432 are available
4. Review the README.md for common solutions

## 📞 Contact

For technical questions or clarifications, please reach out to the hiring team.

---

**Good luck! We look forward to reviewing your work.** 🚀