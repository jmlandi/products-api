<img width="100%" alt="image" src="https://github.com/user-attachments/assets/834cd2a0-f4ac-441c-bd07-ca558da22073" />

# Products API
HUB Laravel para Processamento de Jobs via Amazon SQS. Teste técnico para [irroba](https://www.irroba.com.br)

## 📋 Descrição do Projeto

Esta aplicação Laravel funciona como um HUB para receber e processar jobs de atualização de produtos através de uma fila do Amazon SQS. O sistema é responsável por atualizar dados de produtos, incluindo estoque, preço, descrição, imagens e tags de forma assíncrona e escalável.

## 🎯 Pontos-Chave do Teste Técnico

### Requisitos Implementados:
- ✅ **Framework Laravel** com arquitetura robusta
- ✅ **Integração com Amazon SQS** para consumo de jobs
- ✅ **Execução assíncrona** com prevenção de duplicação
- ✅ **Sistema de filas (Queues)** e agendamento de tarefas
- ✅ **Mecanismo de logs** para monitoramento e falhas
- ✅ **Segurança** contra ataques comuns (SQL Injection, XSS, CSRF)
- ✅ **Documentação da API** com exemplos de uso

### Critérios de Avaliação Atendidos:
- **Organização do código**: Estrutura Laravel bem definida com DTOs, Jobs e Controllers
- **Integração SQS**: Configuração completa para AWS SQS
- **Gestão de filas**: Sistema eficiente de processamento assíncrono
- **Prevenção de duplicação**: Implementação de unicidade nos jobs
- **Sistema de logs**: Monitoramento completo de jobs e schedulers
- **Segurança**: Middleware de autenticação e proteções nativas do Laravel
- **Testes**: Estrutura com testes unitários simples
- **Documentação**: API documentada com exemplos

## 🚀 Quick Start

### Pré-requisitos
- PHP 8.2+
- Composer
- Node.js (para assets)
- Conta AWS (free-tier)

### Configuração (Mac/Linux/Windows)

1. **Clone e instale dependências:**
```bash
git clone <repository-url>
cd products-api
composer install
npm install
```

2. **Configure o ambiente:**
```bash
cp .env.example .env
php artisan key:generate
```

3. **Configure o banco de dados:**
```bash
# PostgreSQL via Docker (recomendado)
docker run --name products-api-db \
  -e POSTGRES_DB=products \
  -e POSTGRES_USER=postgres \
  -e POSTGRES_PASSWORD=postgres \
  -p 5432:5432 \
  -d postgres

# Atualize as variáveis no .env para PostgreSQL:
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=products
# DB_USERNAME=postgres
# DB_PASSWORD=postgres

# Execute as migrations
php artisan migrate
```

4. **Configure a fila SQS:**

Crie uma fila SQS na AWS Console e configure no `.env`:

```env
# Configurações obrigatórias para SQS
QUEUE_CONNECTION=sqs
AWS_ACCESS_KEY_ID=sua-access-key-aqui
AWS_SECRET_ACCESS_KEY=sua-secret-key-aqui
AWS_DEFAULT_REGION=us-east-1
SQS_PREFIX=https://sqs.us-east-1.amazonaws.com/123456789012
SQS_QUEUE=product-updates
```

5. **Configure o token de autenticação da API:**

```env
# Token para autenticação Bearer das rotas da API
API_TOKEN=seu-token-seguro-aqui
```

Este token é usado para autenticar todas as requisições HTTP para as rotas da API. Gere um token seguro:

```bash
# Gerar token aleatório seguro
php -r "echo bin2hex(random_bytes(32));"
```

**⚠️ Chaves importantes do .env:**
- `AWS_ACCESS_KEY_ID`: Chave de acesso AWS (obrigatória)
- `AWS_SECRET_ACCESS_KEY`: Chave secreta AWS (obrigatória)
- `AWS_DEFAULT_REGION`: Região da fila SQS (sugerido: us-east-1)
- `SQS_PREFIX`: URL base da sua conta SQS
- `SQS_QUEUE`: Nome da fila (sugerido: product-updates)
- `API_TOKEN`: Token Bearer para autenticação das rotas da API (obrigatório)

6. **Inicie os workers:**
```bash
# Worker para processar jobs
php artisan queue:work sqs

# Scheduler (em outra aba)
php artisan schedule:work
```

7. **Inicie o servidor:**
```bash
php artisan serve
```

## 🗄️ Estrutura do Banco de Dados

![ERD - Entity Relationship Diagram](docs/products_erd.svg)

O diagrama acima mostra as relações entre as entidades principais:
- **Products**: Produto principal com SKU, nome, preço e descrição
- **Brands**: Marcas dos produtos
- **Colors**: Cores disponíveis
- **Tags**: Tags para categorização
- **Images**: Imagens dos produtos
- **ProductVariations**: Variações de produtos (tamanho, cor, estoque)

## 🔗 API Endpoints

### 📁 Importar Coleção para Ferramentas de API

Para facilitar os testes, você pode importar as coleções da API diretamente nas ferramentas:

- **📂 [Insomnia Collection](docs/api_rest_insomnia.yaml)** - Arquivo YAML para importar no Insomnia
- **📂 [HAR File](docs/api_rest.har)** - Arquivo HAR compatível com Postman e outras ferramentas

### Autenticação
Todas as rotas requerem o header:
```
Authorization: Bearer {API_TOKEN}
```

### 📦 Brands
```http
POST /api/brands
PATCH /api/brands/update-name
```

### 🎨 Colors  
```http
POST /api/colors
PATCH /api/colors/update-name
```

### 🏷️ Tags
```http
POST /api/tags  
PATCH /api/tags/update-name
```

### 🖼️ Images
```http
POST /api/images
PATCH /api/images/update-alt-text
```

### 🛍️ Products
```http
POST /api/products
PATCH /api/products/update-availability
PATCH /api/products/update-brand
PATCH /api/products/update-sku
PATCH /api/products/update-name
PATCH /api/products/update-description
PATCH /api/products/update-price
PATCH /api/products/attach-tag
PATCH /api/products/detach-tag
```

### 📋 Product Variations
```http
POST /api/product-variations
PATCH /api/product-variations/update-availability
PATCH /api/product-variations/update-child-sku
PATCH /api/product-variations/update-stock-total
PATCH /api/product-variations/update-stock-reserved
PATCH /api/product-variations/update-color
PATCH /api/product-variations/update-size
PATCH /api/product-variations/attach-image
PATCH /api/product-variations/detach-image
```

### Exemplos de Requisições

**Resposta padrão para todas as requisições:**
```json
{
  "message": "job enqueued"
}
```
Status: `202 Accepted`

---

#### 📦 **Brands**

##### Criar Marca
```json
POST /api/brands
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "name": "Nike"
}
```

##### Atualizar Nome da Marca
```json
PATCH /api/brands/update-name
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "name": "Nike Inc."
}
```

---

#### 🎨 **Colors**

##### Criar Cor
```json
POST /api/colors
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "name": "Azul"
}
```

##### Atualizar Nome da Cor
```json
PATCH /api/colors/update-name
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "name": "Azul Marinho"
}
```

---

#### 🏷️ **Tags**

##### Criar Tag
```json
POST /api/tags
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "name": "Esportivo"
}
```

##### Atualizar Nome da Tag
```json
PATCH /api/tags/update-name
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "name": "Fitness"
}
```

---

#### 🖼️ **Images**

##### Criar Imagem
```json
POST /api/images
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "url": "https://example.com/image.jpg",
  "alt_text": "Produto em destaque"
}
```

##### Atualizar Texto Alternativo
```json
PATCH /api/images/update-alt-text
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "alt_text": "Novo texto alternativo da imagem"
}
```

---

#### 🛍️ **Products**

##### Criar Produto
```json
POST /api/products
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "sku": "BONE-NE",
  "name": "Boné Aba Reta",
  "price": 99.90,
  "brand_id": 1,
  "description": "Boné aba reta da New Era. Confortável e estiloso",
  "is_active": true
}
```

##### Atualizar Disponibilidade
```json
PATCH /api/products/update-availability
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "is_active": false
}
```

##### Atualizar Marca
```json
PATCH /api/products/update-brand
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "brand_id": 2
}
```

##### Atualizar SKU
```json
PATCH /api/products/update-sku
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "sku": "BONE-NE-001"
}
```

##### Atualizar Nome
```json
PATCH /api/products/update-name
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "name": "Boné Aba Reta Premium"
}
```

##### Atualizar Descrição
```json
PATCH /api/products/update-description
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "description": "Boné aba reta da New Era. Confortável, estiloso e durável."
}
```

##### Atualizar Preço
```json
PATCH /api/products/update-price
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "price": 119.90
}
```

##### Associar Tag
```json
PATCH /api/products/attach-tag
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "product_id": 1,
  "tag_id": 1
}
```

##### Remover Tag
```json
PATCH /api/products/detach-tag
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "product_id": 1,
  "tag_id": 1
}
```

---

#### 📋 **Product Variations**

##### Criar Variação
```json
POST /api/product-variations
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "product_id": 1,
  "child_sku": "BONE-NE-P-AZUL",
  "color_id": 1,
  "size": "P",
  "stock_total": 100,
  "stock_reserved": 5,
  "is_active": true
}
```

##### Atualizar Disponibilidade da Variação
```json
PATCH /api/product-variations/update-availability
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "is_active": false
}
```

##### Atualizar SKU Filho
```json
PATCH /api/product-variations/update-child-sku
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "child_sku": "BONE-NE-P-AZUL-001"
}
```

##### Atualizar Estoque Total
```json
PATCH /api/product-variations/update-stock-total
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "stock_total": 150
}
```

##### Atualizar Estoque Reservado
```json
PATCH /api/product-variations/update-stock-reserved
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "stock_reserved": 10
}
```

##### Atualizar Cor
```json
PATCH /api/product-variations/update-color
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "color_id": 2
}
```

##### Atualizar Tamanho
```json
PATCH /api/product-variations/update-size
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "id": 1,
  "size": "M"
}
```

##### Associar Imagem à Variação
```json
PATCH /api/product-variations/attach-image
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "product_variation_id": 1,
  "image_id": 1
}
```

##### Remover Imagem da Variação
```json
PATCH /api/product-variations/detach-image
Content-Type: application/json
Authorization: Bearer your-api-token

{
  "product_variation_id": 1,
  "image_id": 1
}
```

## ⚙️ Jobs Implementados

### Jobs de Criação
- **CreateProductJob**: Cria novo produto
- **CreateBrandJob**: Cria nova marca  
- **CreateColorJob**: Cria nova cor
- **CreateTagJob**: Cria nova tag
- **CreateImageJob**: Cria nova imagem
- **CreateProductVariationJob**: Cria variação de produto

### Jobs de Atualização - Produtos
- **UpdateProductAvailabilityJob**: Atualiza disponibilidade
- **UpdateProductBrandJob**: Atualiza marca do produto
- **UpdateProductSkuJob**: Atualiza SKU
- **UpdateProductNameJob**: Atualiza nome
- **UpdateProductDescriptionJob**: Atualiza descrição
- **UpdateProductPriceJob**: Atualiza preço

### Jobs de Atualização - Variações
- **UpdateProductVariationAvailabilityJob**: Atualiza disponibilidade da variação
- **UpdateProductVariationChildSkuJob**: Atualiza SKU filho
- **UpdateProductVariationStockTotalJob**: Atualiza estoque total
- **UpdateProductVariationStockReservedJob**: Atualiza estoque reservado
- **UpdateProductVariationColorJob**: Atualiza cor da variação
- **UpdateProductVariationSizeJob**: Atualiza tamanho

### Jobs de Relacionamento
- **AttachProductTagJob**: Associa tag ao produto
- **DetachProductTagJob**: Remove tag do produto
- **AttachProductVariationImagesJob**: Associa imagens à variação
- **DetachProductVariationImagesJob**: Remove imagens da variação

### Jobs de Atualização - Outros
- **UpdateBrandJob**: Atualiza dados da marca
- **UpdateColorJob**: Atualiza dados da cor
- **UpdateTagJob**: Atualiza dados da tag
- **UpdateImageAltTextJob**: Atualiza texto alternativo da imagem

### 🔒 Estratégias de Deduplicação

Todos os jobs implementam **`ShouldBeUnique`** para prevenir execução duplicada:

```php
class CreateProductJob implements ShouldQueue, ShouldBeUnique
{
    public function uniqueId()
    {
        return $this->payload->sku; // Identifica uniqueness pelo SKU
    }
}
```

**Estratégias por tipo:**
- **Produtos**: `uniqueId()` baseado no SKU
- **Atualizações**: `uniqueId()` baseado no ID + campo específico
- **Relacionamentos**: `uniqueId()` baseado nos IDs relacionados

## 📊 Sistema de Logs

### Logs de Jobs (AppServiceProvider.php)

O sistema registra todos os eventos de jobs:

```php
// Job adicionado à fila
Event::listen(JobQueued::class, function (JobQueued $e) {
    Log::info('job_queued', [
        'app' => env('APP_NAME'),
        'job' => $e->job::class,
        'queue' => $e->queue,
        'queued_at' => now()->toISOString(),
    ]);
});

// Job iniciando processamento
Queue::before(function (JobProcessing $e) {
    Log::info('job_processing', [
        'job' => $e->job->resolveName(),
        'job_id' => $e->job->getJobId(),
        'attempts' => $e->job->attempts(),
    ]);
});

// Job processado com sucesso  
Queue::after(function (JobProcessed $e) {
    Log::info('job_processed', [
        'job' => $e->job->resolveName(),
        'job_id' => $e->job->getJobId(),
    ]);
});

// Job falhou
Queue::failing(function (JobFailed $e) {
    Log::error('job_failed', [
        'job' => $e->job->resolveName(),
        'exception' => $e->exception->getMessage(),
    ]);
});
```

### Logs de Schedulers

```php
// Tarefa agendada iniciando
Event::listen(ScheduledTaskStarting::class, function (ScheduledTaskStarting $e) {
    Log::info('scheduled_task_starting', [
        'task' => $e->task->getSummaryForDisplay(),
        'command' => $e->task->command,
    ]);
});

// Tarefa concluída
Event::listen(ScheduledTaskFinished::class, function (ScheduledTaskFinished $e) {
    Log::info('scheduled_task_finished', [
        'runtime' => $e->runtime . 'ms',
    ]);
});

// Tarefa falhou
Event::listen(ScheduledTaskFailed::class, function (ScheduledTaskFailed $e) {
    Log::error('scheduled_task_failed', [
        'exception' => $e->exception->getMessage(),
        'file' => $e->exception->getFile(),
        'line' => $e->exception->getLine(),
    ]);
});
```

### Monitoramento de Logs

Os logs são estruturados em JSON e incluem:
- **Timestamp**: Horário exato do evento
- **Contexto**: Informações do job/task
- **Metadados**: IDs, tentativas, tempo de execução
- **Erros**: Stack trace completo em caso de falha

Para monitoramento em produção, os logs podem ser enviados para:
- CloudWatch (AWS)
- ELK Stack (Elasticsearch, Logstash, Kibana)
- Sentry para tracking de erros

## 🧪 Testes

```bash
# Executar todos os testes
php artisan test

# Testes com cobertura
php artisan test --coverage

# Testes específicos
php artisan test --filter=ProductJobTest
```

## 🔐 Segurança

- **Autenticação**: Middleware `api.token` para todas as rotas
- **SQL Injection**: Uso de Eloquent ORM e prepared statements
- **XSS**: Sanitização automática do Laravel
- **CSRF**: Proteção nativa para formulários web
- **Rate Limiting**: Configurável por rota
- **Validação**: DTOs garantem estrutura correta dos dados

## 📈 Escalabilidade

- **Workers múltiplos**: `php artisan queue:work --queue=high,default`
- **Timeout configurável**: Para jobs de longa duração
- **Retry automático**: Jobs falhos são reprocessados
- **Monitoramento**: Logs estruturados para análise de performance

## 🚀 Deploy

Para produção, configure:
- Supervisor para workers persistentes
- Redis para cache e sessions
- LoadBalancer para múltiplas instâncias
- Monitoring com CloudWatch/Prometheus

---

**Desenvolvido como teste técnico demonstrando expertise em:**
- Laravel Framework
- Amazon SQS Integration  
- Asynchronous Job Processing
- RESTful API Design
- Database Architecture
- Security Best Practices
- Production-Ready Logging
