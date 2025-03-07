# Вебсайт с уязвимостями
## Описание
Этот репозиторий содержит веб-приложение с исправленными уязвимостями, которое можно развернуть с использованием Docker. В отличие от более [новой версии](https://github.com/RockerzXY/pt-website)
, здесь отсутствует `docker-compose.yml`, а развёртывание осуществляется <ins>напрямую через Dockerfile</ins>.

## Установка и запуск
Для развёртывания приложения выполните следующие шаги:
1. Клонируйте репозиторий
  ```sh
  git clone https://github.com/RockerzXY/website-pt-start/
  cd website-pt-start
  ```
2. Соберите Docker-образ:
  ```sh
  docker build -t website-pt-start .
  ```
3. Запустите контейнер:
   ```sh
   docker run -d -p 8080:80 --name website-pt-start website-pt-start
   ```
5. Вебсайт будет доступен по адресу:
  ```
  http://localhost:8080
  ```

## Структура проекта
  - `Dockerfile` — скрипт сборки Docker-образа.
  - `Остальные файлы` — исходный код веб-приложения. 
