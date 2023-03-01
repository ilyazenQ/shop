-- Создание таблицы групп товаров
CREATE TABLE groups (
                        id INT PRIMARY KEY,
                        name VARCHAR(50) NOT NULL,
                        image_url VARCHAR(255) NOT null
);

CREATE INDEX IDX_GROUPS_NAME ON groups(name);

-- Создание таблицы категорий товаров
CREATE TABLE categories (
                            id INT PRIMARY KEY,
                            group_id INT NOT NULL,
                            name VARCHAR(50) NOT NULL,
                            image_url VARCHAR(255) NOT NULL,
                            FOREIGN KEY (group_id) REFERENCES groups(id)
);

CREATE INDEX IDX_CATEGORIES_NAME ON categories(name);

-- Создание таблицы подкатегорий товаров
CREATE TABLE subcategories (
                               id INT PRIMARY KEY,
                               category_id INT NOT NULL,
                               name VARCHAR(50) NOT NULL,
                               image_url VARCHAR(255) NOT NULL,
                               FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE INDEX IDX_SUBCATEGORIES_NAME ON subcategories(name);

-- Создание таблицы товаров
CREATE TABLE products (
                          id INT PRIMARY KEY,
                          subcategory_id INT NOT NULL,
                          name VARCHAR(100) NOT NULL,
                          image_url VARCHAR(255) NOT NULL,
                          extra JSON DEFAULT '{}' NOT NULL,
                          FOREIGN KEY (subcategory_id) REFERENCES subcategories(id)
);

CREATE INDEX IDX_products_NAME ON products(name);


-- Создание таблицы городов
CREATE TABLE cities (
                        id INT PRIMARY KEY,
                        name VARCHAR(50) NOT NULL
);

CREATE INDEX IDX_cities_NAME ON cities(name);

-- Создание таблицы складов
CREATE TABLE warehouses (
                            id INT PRIMARY KEY,
                            city_id INT NOT NULL,
                            name VARCHAR(50) NOT NULL,
                            address VARCHAR(255) NOT NULL,
                            FOREIGN KEY (city_id) REFERENCES cities(id)
);

CREATE INDEX IDX_warehouses_NAME ON warehouses(name);
CREATE INDEX IDX_warehouses_address ON warehouses(address);

-- Создание таблицы остатков и цен
CREATE TABLE leftovers (
                           id INT PRIMARY KEY,
                           product_id INT NOT NULL,
                           warehouse_id INT NOT NULL,
                           quantity INT NOT NULL,
                           price INT NOT NULL,
                           FOREIGN KEY (product_id) REFERENCES products(id),
                           FOREIGN KEY (warehouse_id) REFERENCES warehouses(id)
);

-- Создание таблицы дополнительных полей товаров
CREATE TABLE product_fields (
                                id INT PRIMARY KEY,
                                product_id INT NOT NULL,
                                name VARCHAR(50) NOT NULL,
                                value VARCHAR(255) NOT NULL,
                                FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE INDEX IDX_product_fields_NAME ON product_fields(name);
CREATE INDEX IDX_product_fields_value ON product_fields(value);

-- Создание таблицы пользователей
CREATE TABLE users (
                       id INT PRIMARY KEY,
                       email VARCHAR(255) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       name VARCHAR(50) NOT NULL,
                       phone VARCHAR(20) NOT NULL,
                       address VARCHAR(255) NOT NULL
);

CREATE INDEX IDX_users_NAME ON users(name);
CREATE INDEX IDX_users_email ON users(email);

-- Создание таблицы корзины покупателя
CREATE TABLE carts (
                       id INT PRIMARY KEY,
                       user_id INT NOT NULL,
                       FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Создание таблицы корзины покупателя
CREATE TABLE carts_items (
                             id INT PRIMARY KEY,
                             product_id INT NOT NULL,
                             carts_id INT NOT NULL,
                             quantity INT NOT NULL,
                             price INT NOT NULL,
                             FOREIGN KEY (product_id) REFERENCES products(id),
                             FOREIGN KEY (carts_id) REFERENCES carts(id)
);

-- Создание таблицы заказов
CREATE TABLE orders (
                        id INT PRIMARY KEY,
                        user_id INT NOT NULL,
                        warehouse_id INT NOT NULL,
                        delivery_address VARCHAR(255) NOT NULL,
                        delivery_date INT NOT NULL,
                        status VARCHAR(50) NOT NULL DEFAULT 'created',
                        FOREIGN KEY (user_id) REFERENCES users(id),
                        FOREIGN KEY (warehouse_id) REFERENCES warehouses(id)
);

CREATE INDEX IDX_orders_status ON orders(status);
CREATE INDEX IDX_orders_delivery_date ON orders(delivery_date);

-- Создание таблицы товаров в заказе
CREATE TABLE order_items (
                             order_id INT NOT NULL,
                             product_id INT NOT NULL,
                             quantity INT NOT NULL,
                             price INT NOT NULL,
                             PRIMARY KEY (order_id, product_id),
                             FOREIGN KEY (order_id) REFERENCES orders(id),
                             FOREIGN KEY (product_id) REFERENCES products(id)
);
