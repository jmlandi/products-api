#!/bin/bash

# Products API Docker Setup Script
echo "🚀 Setting up Products API with Docker..."

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker and try again."
    exit 1
fi

# Copy environment file
if [ ! -f .env ]; then
    echo "📋 Creating .env file from .env.docker..."
    cp .env.docker .env
    echo "⚠️  Please update your .env file with your actual AWS credentials and API keys before running the application."
fi

# Build and start services
echo "🔨 Building Docker images..."
docker-compose build

echo "🚀 Starting services..."
docker-compose up -d

# Wait for database to be ready
echo "⏳ Waiting for database to be ready..."
sleep 10

# Run migrations
echo "🗄️  Running database migrations..."
docker-compose exec app php artisan migrate --force

# Generate application key if needed
echo "🔑 Generating application key..."
docker-compose exec app php artisan key:generate --force

# Cache configuration
echo "⚡ Caching configuration..."
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache

echo "✅ Setup complete!"
echo ""
echo "🌐 Your application is running at: http://localhost:8000"
echo ""
echo "📊 Services status:"
docker-compose ps
echo ""
echo "🔧 Useful commands:"
echo "  - View logs: docker-compose logs -f"
echo "  - Stop services: docker-compose down"
echo "  - Restart services: docker-compose restart"
echo "  - Run artisan commands: docker-compose exec app php artisan <command>"
echo "  - Access database: docker-compose exec postgres psql -U products_user -d products_api"