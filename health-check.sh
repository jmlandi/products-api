#!/bin/bash

# Health check script for Docker containers
echo "🏥 Products API Health Check"
echo "=============================="

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running"
    exit 1
fi

echo "✅ Docker is running"

# Check container status
echo ""
echo "📊 Container Status:"
docker-compose ps

echo ""
echo "🔍 Service Health Checks:"

# Database health
if docker-compose exec -T postgres pg_isready -U products_user -d products_api > /dev/null 2>&1; then
    echo "✅ PostgreSQL: Healthy"
else
    echo "❌ PostgreSQL: Unhealthy"
fi

# App health
if curl -s -o /dev/null -w "%{http_code}" http://localhost:8000 | grep -q "200\|302"; then
    echo "✅ Laravel App: Healthy"
else
    echo "❌ Laravel App: Unhealthy"
fi

# Queue worker health (check if process is running)
if docker-compose exec -T queue ps aux | grep -q "artisan queue:work"; then
    echo "✅ Queue Worker: Running"
else
    echo "❌ Queue Worker: Not running"
fi

# Scheduler health (check if process is running)
if docker-compose exec -T scheduler ps aux | grep -q "artisan schedule:run"; then
    echo "✅ Scheduler: Running"
else
    echo "❌ Scheduler: Not running"
fi

echo ""
echo "📈 Resource Usage:"
docker stats --no-stream --format "table {{.Container}}\t{{.CPUPerc}}\t{{.MemUsage}}"

echo ""
echo "🔗 Service URLs:"
echo "  - API: http://localhost:8000"
echo "  - Database: localhost:5432"

echo ""
echo "🏥 Health check complete!"