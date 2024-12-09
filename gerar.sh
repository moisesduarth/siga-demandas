#!/bin/bash

# Diretórios base
MIGRATION_DIR="./application/migrations"
MODEL_DIR="./application/models"
CONTROLLER_DIR="./application/controllers"
VIEW_DIR="./application/views/loans"

# Certifique-se de que os diretórios existem
mkdir -p "$MIGRATION_DIR"
mkdir -p "$MODEL_DIR"
mkdir -p "$CONTROLLER_DIR"
mkdir -p "$VIEW_DIR"

# Função para criar arquivo com timestamp (para migrations)
create_migration_file() {
  local filename="$1"
  local timestamp=$(date +%Y%m%d%H%M%S)
  local fullpath="$MIGRATION_DIR/${timestamp}_$filename.php"
  
  # Cria o arquivo vazio
  touch "$fullpath"
  echo "Criado (Migration): $fullpath"
}

# Função para criar arquivos simples (models, controllers, views)
create_file() {
  local dir="$1"
  local filename="$2"
  local fullpath="$dir/$filename.php"
  
  # Cria o arquivo vazio
  touch "$fullpath"
  echo "Criado: $fullpath"
}

# Criando arquivos de migração
create_migration_file "create_items_table"
create_migration_file "create_assets_table"
create_migration_file "create_loans_table"
create_migration_file "create_loan_items_table"

# Criando arquivos de models
create_file "$MODEL_DIR" "ItemModel"
create_file "$MODEL_DIR" "AssetModel"
create_file "$MODEL_DIR" "LoanModel"
create_file "$MODEL_DIR" "LoanItemModel"

# Criando arquivo de controller
create_file "$CONTROLLER_DIR" "LoanController"

# Criando arquivos de views
touch "$VIEW_DIR/create.php"
echo "Criado: $VIEW_DIR/create.php"

touch "$VIEW_DIR/receipt.php"
echo "Criado: $VIEW_DIR/receipt.php"

touch "$VIEW_DIR/return_receipt.php"
echo "Criado: $VIEW_DIR/return_receipt.php"

echo "Todos os arquivos foram criados com sucesso!"
