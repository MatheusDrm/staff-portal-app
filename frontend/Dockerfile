# Usa a imagem oficial do Nginx
FROM nginx:latest

# Copia os arquivos do frontend para a pasta padrão do Nginx
COPY . /usr/share/nginx/html

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
