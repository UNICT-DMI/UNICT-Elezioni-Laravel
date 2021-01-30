$choice = Read-Host -Prompt 'Enter ''y'' to publish it, otherwise it will be started locally'

if ($choice -eq 'y') {
  php .\artisan serve --host='0.0.0.0' --port=8080
}
else {
  php .\artisan serve --port=8080
}