# Дипломный проект
Дипломный проект (ДП) студента специальности 09.02.07 Информационные системы и программирование, квалификация **Администратор Баз Данных**

Тема: **Веб-приложение "Стоматологический центр"**

## Запуск проекта


1. Необходимое программное обеспечение:

   - PHP 8 и выше

3. В командной строке перейти в каталог project:

  ```console
 kp> cd project
  ```

3. Сделать миграции БД в терминале IDE:

 ```console
project> php artisan migrate:fresh --seed
 ```
4. Запустить приложение:

  ```console
kp\project> php artisan serve
  ```
    
5. Перейти в браузере по адресу: http://127.0.0.1:8001.