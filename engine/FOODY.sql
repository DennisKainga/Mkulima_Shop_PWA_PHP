CREATE TABLE login(
    login_id INT PRIMARY KEY AUTO_INCREMENT,
    login_username VARCHAR(200),
    login_email VARCHAR(200),
    login_password VARCHAR(200),
    login_rank VARCHAR(100)
);

CREATE TABLE county(
    county_id INT PRIMARY KEY AUTO_INCREMENT,
    county_name VARCHAR(200)
);

CREATE TABLE town(
    town_id INT PRIMARY KEY AUTO_INCREMENT,
    town_name VARCHAR(200),
    town_description VARCHAR(200),
    town_county_id INT,
FOREIGN KEY(town_county_id) REFERENCES county(county_id) ON DELETE CASCADE
);

CREATE TABLE sys_user(
    sys_user_id INT PRIMARY KEY AUTO_INCREMENT,
    sys_user_first_name VARCHAR(200),
    sys_user_last_name VARCHAR(200),
    sys_user_mobile VARCHAR(200),
    
    #FOREIGN KEYS START HERE
    sys_user_town_id INT,
    sys_user_login_id INT,
    FOREIGN KEY(sys_user_login_id) REFERENCES login(login_id) ON DELETE CASCADE,
    FOREIGN KEY(sys_user_town_id) REFERENCES town(town_id) ON DELETE CASCADE
);


CREATE TABLE category(
    category_id INT PRIMARY KEY AUTO_INCREMENT, 
    category_name VARCHAR(200),
    category_description VARCHAR(200)
);

CREATE TABLE products(
    product_id INT PRIMARY KEY AUTO_INCREMENT,  
    product_name VARCHAR(200),
    product_price FLOAT,
    product_image VARCHAR(200),
    product_is_stocked VARCHAR(6),
    product_unit_type VARCHAR(100),
    product_quantity INT,
    
    #FOREIGN KEYS START HERE
    product_category_id INT,
    product_sys_user_id INT,
    FOREIGN KEY(product_category_id) REFERENCES category(category_id) ON DELETE CASCADE,
    FOREIGN KEY(product_sys_user_id) REFERENCES sys_user(sys_user_id) ON DELETE CASCADE
);

CREATE TABLE product_order(
    product_order_id INT PRIMARY KEY AUTO_INCREMENT,
    product_order_allowed_duration INT,
    product_order_date VARCHAR(100),

    #FOREIGN KEYS START HERE
    product_order_sys_user_id INT,
    product_order_product_id INT,
    FOREIGN KEY(product_order_sys_user_id) REFERENCES sys_user(sys_user_id) ON DELETE CASCADE,
    FOREIGN KEY(product_order_product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

CREATE TABLE payment(
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    payment_amount FLOAT,
    payment_amount_due FLOAT,
    payment_amount_transacted FLOAT,
    payment_ref_number VARCHAR(200),
    payment_date VARCHAR(200),
    payment_status VARCHAR(10),

    #FOREIGN KEY START HERE
    payment_product_order_id INT,
    FOREIGN KEY(payment_product_order_id) REFERENCES product_order(product_order_id) ON DELETE CASCADE
); 

CREATE TABLE pickup_point(
    pickup_point_id INT PRIMARY KEY AUTO_INCREMENT,
    pickup_point_status VARCHAR(100),
    pickup_point_date VARCHAR(200),
    pickup_point_time VARCHAR(200),
    pick_point_location_desc VARCHAR(200),

    #FOREIGN KEYS START HERE
    pickup_point_town_id INT,
    pickup_point_product_order_id INT,
    pickup_point_sys_user_id INT,
    pickup_point_payment_id INT,

    FOREIGN KEY(pickup_point_town_id) REFERENCES town(town_id) ON DELETE CASCADE,
    FOREIGN KEY(pickup_point_product_order_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY(pickup_point_sys_user_id) REFERENCES sys_user(sys_user_id) ON DELETE CASCADE, #refers to farmer
    FOREIGN KEY(pickup_point_payment_id) REFERENCES payment(payment_id) ON DELETE CASCADE
);

