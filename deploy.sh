#!/bin/bash

# Diretório e nome dos arquivos principais
PROJECT_DIR="/Applications/MAMP/htdocs/credito"
FTP_USER="sigaftp"
FTP_PASSWORD="C0ntr0l3t0t@l#"
FTP_HOST="ftp.sistemasaf.com.br"
DEPLOY_ZIP="deploy.zip"

# Funções de log para facilitar o acompanhamento
log_info() { echo -e "\033[1;34m[INFO] $1\033[0m"; }
log_error() { echo -e "\033[1;31m[ERRO] $1\033[0m"; }

# 1. Renomeia os arquivos de configuração para não sobrescrever no servidor
log_info "Renomeando arquivos de configuração locais para evitar sobrescrita..."
mv "$PROJECT_DIR/application/config/config.php" "$PROJECT_DIR/application/config/config-dev.php" || { log_error "Erro ao renomear config.php"; exit 1; }
mv "$PROJECT_DIR/application/config/database.php" "$PROJECT_DIR/application/config/database-dev.php" || { log_error "Erro ao renomear database.php"; exit 1; }

# 2. Compacta todos os arquivos, exceto logs e arquivos .zip existentes
log_info "Compactando arquivos do projeto em $DEPLOY_ZIP, excluindo logs e arquivos zip antigos..."
cd "$PROJECT_DIR" || exit
zip -r "$DEPLOY_ZIP" . -x "*.log" "*.zip"
if [[ $? -ne 0 ]]; then
    log_error "Erro ao criar arquivo $DEPLOY_ZIP."
    exit 1
fi

# 3. Restaura os arquivos de configuração ao nome original
log_info "Restaurando arquivos de configuração para os nomes originais..."
mv "$PROJECT_DIR/application/config/config-dev.php" "$PROJECT_DIR/application/config/config.php" || { log_error "Erro ao restaurar config.php"; exit 1; }
mv "$PROJECT_DIR/application/config/database-dev.php" "$PROJECT_DIR/application/config/database.php" || { log_error "Erro ao restaurar database.php"; exit 1; }

# 4. Envia o arquivo compactado para o FTP
log_info "Enviando $DEPLOY_ZIP para o servidor FTP..."
lftp -u "$FTP_USER","$FTP_PASSWORD" "$FTP_HOST" <<EOF
set ssl:verify-certificate no
cd "$REMOTE_DIR"
put -O "$REMOTE_DIR" "$DEPLOY_ZIP"
bye
EOF
if [[ $? -ne 0 ]]; then
    log_error "Erro ao enviar o arquivo $DEPLOY_ZIP para o FTP."
    exit 1
fi

# 5. Conecta-se ao servidor para descompactar o arquivo e substituir os arquivos antigos
log_info "Descompactando $DEPLOY_ZIP no servidor remoto..."
ssh "$FTP_USER@$FTP_HOST" <<EOF
set ssl:verify-certificate no
unzip -o "$DEPLOY_ZIP"
rm -f "$DEPLOY_ZIP"  # Remove o arquivo zip após a descompactação
EOF
if [[ $? -ne 0 ]]; then
    log_error "Erro ao descompactar $DEPLOY_ZIP no servidor remoto."
    exit 1
fi

# 6. Conclui o processo com uma mensagem de sucesso
log_info "Deploy concluído com sucesso."
