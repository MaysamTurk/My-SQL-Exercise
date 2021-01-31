------------- Q-1 ---------------
CREATE TABLE countries 
(
    country_id int,
    country_name varchar(255),
    region_id int
);

------------- Q-2 ---------------
CREATE TABLE IF NOT EXIST countries 
(
    country_id int,
    country_name varchar(255),
    region_id int
);

------------- Q-3 ---------------
CREATE TABLE IF NOT EXISTS dup_countries
LIKE countries;

------------- Q-4 ---------------
CREATE TABLE IF NOT EXISTS dup_countries 
SELECT * FROM
countries;

------------- Q-5 ---------------
CREATE TABLE countries 
(
    country_id int NOT NULL,
    country_name varchar(255) NOT NULL,
    region_id int NOT NULL
);

------------- Q-6 ---------------
CREATE TABLE jobs 
(
    job_id int,
    job_title varchar(255),
    min_salary int,
    max_salary int CHECK(max_salary <= 25000)
);

------------- Q-7 ---------------
CREATE TABLE countries 
(
    country_id int,
    country_name varchar(255) (country_name IN ('Italy', 'India', 'China')),
    region_id int
);

------------- Q-8 ---------------
CREATE TABLE job_history 
(
    job_id
    department_id,
    employee_id int,
    start_date date,
    end_date date CHECK (end_date LIKE '--/--/----')
);

------------- Q-9 ---------------
CREATE TABLE countries 
(
    country_id int,
    country_name varchar(255),
    region_id int,
    UNIQUE(country_id)
);

------------- Q-10 --------------
CREATE TABLE jobs
(
    job_id int,
    job_title varchar(255) not null default , 
    min_salary decimal default 8000,
    max_salary decimal default Null
);
------------- Q-11 --------------
CREATE TABLE countries 
(
    country_id int NOT NULL UNIQUE PRIMARY KEY,
    country_name varchar(255) NOT NULL,
    region_id int NOT NULL
);

------------- Q-12 --------------
CREATE TABLE countries 
(
    country_id int NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    country_name varchar(255),
    region_id int,
);

------------- Q-13 --------------
CREATE TABLE countries 
(
    country_id int NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    country_name varchar(255),
    region_id int,
    PRIMARY KEY (country_id, region_id);

);

------------- Q-14 --------------
CREATE TABLE job_history 
(
    employee_id int,
    start_date date,
    end_date,
    job_id,
    department_id
    PRIMARY KEY (employee_id);
    foreign key(job_id) References jobs(job_id);
);

------------- Q-15 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30),
    last_name varchar (255),
    email varchar (255),
    phone_number int,
    hire_date date,
    job_id int,
    salary varchar,
    commission varchar,
    manager_id decimal(6,0) primary key NOT NULL,
    department_id int NOT NULL, 
    foreign key(department_id, manager_id);
);

------------- Q-16 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30),
    last_name varchar (255),
    email varchar (255),
    phone_number int,
    hire_date date,
    job_id int,
    salary varchar,
    commission varchar,
    manager_id decimal(6,0) primary key NOT NULL,
    department_id int NOT NULL, 
    foreign key(department_id) references departments(department_id);
    foreign key(job_id) references jobs(job_id);
)   ENGINE=InnoDB;

------------- Q-17 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30) default null,
    last_name varchar (255) not null,
    email varchar (255) not null,
    phone_number int default null,
    hire_date date not null,
    job_id int not null,
    salary varchar default null,
    commission varchar default null,
    manager_id decimal(6,0) primary key default NULL,
    department_id int default NULL, 
    foreign key(department_id) references departments(department_id);
    foreign key(job_id) references jobs(job_id);
)   ENGINE=InnoDB;

------------- Q-18 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30) default null,
    last_name varchar (255) not null,
    email varchar (255) not null,
    phone_number int default null,
    hire_date date not null,
    job_id int not null,
    salary varchar default null,

    foreign key(job_id) references jobs(job_id);
    ON DELETE CASCADE 
    ON UPDATE RESTRICT
)   ENGINE=InnoDB;

------------- Q-19 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30) default null,
    last_name varchar (255) not null,
    email varchar (255) not null,
    phone_number int default null,
    hire_date date not null,
    job_id int not null,
    salary varchar default null,
    
    foreign key(job_id) references jobs(job_id);
    ON DELETE SET NULL 
    ON UPDATE SET NULL
)   ENGINE=InnoDB;

------------- Q-20 --------------
CREATE TABLE employees 
(
    employee_id decimal(4,0) primary key NOT NULL,
    first_name varchar (30) default null,
    last_name varchar (255) not null,
    email varchar (255) not null,
    phone_number int default null,
    hire_date date not null,
    job_id int not null,
    salary varchar default null,
    
    foreign key(job_id) references jobs(job_id);
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)   ENGINE=InnoDB;
