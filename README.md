# PHP BASE PROJECT AUTH API EXAMPLE
## CREATE DATABASE


``` sql
CREATE DATABASE auth_php
    DEFAULT CHARACTER SET = 'utf8mb4';

use auth_php;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```


## RUN PROJECT
php -S localhost:8000

``` cmd
php -S localhost:8000
```

## API TEST
```
    http://localhost:8000/api/register.php
    http://localhost:8000/api/login.php
```
