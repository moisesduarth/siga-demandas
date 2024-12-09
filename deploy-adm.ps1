#Install-Module Microsoft.PowerShell.Archive -MinimumVersion 1.2.3.0 -Repository PSGallery -Force
Rename-Item C:\xampp\htdocs\emprestimo\application\config\database.php C:\xampp\htdocs\emprestimo\application\config\database-temp.php
Rename-Item C:\xampp\htdocs\emprestimo\application\config\config.php C:\xampp\htdocs\emprestimo\application\config\config-temp.php
Compress-Archive -Path C:\xampp\htdocs\emprestimo\* -DestinationPath C:\xampp\htdocs\emprestimo.zip  -Update

$client = New-Object System.Net.WebClient
$client.Credentials = New-Object System.Net.NetworkCredential('saf', 'C0ntr0l3t0t@l#MSD')
$client.UploadFile("ftp://sistemasaf.com.br/public_html/adm/deploy.php", "C:\xampp\htdocs\emprestimo\deploy.php")
$client.UploadFile("ftp://sistemasaf.com.br/public_html/adm/emprestimo.zip", "C:\xampp\htdocs\emprestimo.zip")

Invoke-WebRequest http://sistemasaf.com.br/adm/deploy.php -OutFile log-deploy.txt
Rename-Item C:\xampp\htdocs\emprestimo\application\config\database-temp.php C:\xampp\htdocs\emprestimo\application\config\database.php
Rename-Item C:\xampp\htdocs\emprestimo\application\config\config-temp.php C:\xampp\htdocs\emprestimo\application\config\config.php

