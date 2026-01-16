CREATE DATABASE management_farm_073;
USE management_farm_073;

CREATE TABLE management_farm_farmers (
    farmer_id INT PRIMARY KEY,
    NAME VARCHAR(100),
    contact VARCHAR(50),
    assigned_tasks TEXT
);
DESC management_farm_farmers;

CREATE TABLE management_farm_plots (
    plot_id INT PRIMARY KEY,
    location VARCHAR(100),
    size DECIMAL(10,2),
    soil_type VARCHAR(50),
    farmer_id INT,
    FOREIGN KEY (farmer_id) REFERENCES management_farm_farmers(farmer_id)
);
DESC management_farm_plots;

CREATE TABLE management_farm_fertilizers (
    fertilizer_id INT PRIMARY KEY,
    NAME VARCHAR(100),
    TYPE VARCHAR(50),
    recommended_usage TEXT
);
DESC management_farm_fertilizers;

CREATE TABLE management_farm_plants (
    plant_id INT PRIMARY KEY,
    plot_id INT,
    growth_stage VARCHAR(50),
    watering_schedule VARCHAR(100),
    fertilizer_use TEXT,
    FOREIGN KEY (plot_id) REFERENCES management_farm_plots(plot_id)
);
DESC management_farm_plants;

CREATE TABLE management_farm_plant_fertilizers (
    plant_id INT,
    fertilizer_id INT,
    PRIMARY KEY (plant_id, fertilizer_id),
    FOREIGN KEY (plant_id) REFERENCES management_farm_plants(plant_id),
    FOREIGN KEY (fertilizer_id) REFERENCES management_farm_fertilizers(fertilizer_id)
);
DESC management_farm_plant_fertilizers;

CREATE TABLE management_farm_harvests (
    harvest_id INT PRIMARY KEY,
    plot_id INT,
    DATE DATE,
    quantity DECIMAL(10,2),
    quality VARCHAR(50),
    farmer_id INT,
    FOREIGN KEY (plot_id) REFERENCES management_farm_plots(plot_id),
    FOREIGN KEY (farmer_id) REFERENCES management_farm_farmers(farmer_id)
);
DESC management_farm_harvests;

CREATE TABLE management_farm_sales (
    sale_id INT PRIMARY KEY,
    harvest_id INT,
    customer VARCHAR(100),
    price DECIMAL(10,2),
    delivery_date DATE,
    FOREIGN KEY (harvest_id) REFERENCES management_farm_harvests(harvest_id)
);
DESC management_farm_sales;

INSERT INTO management_farm_farmers (farmer_id, NAME, contact, assigned_tasks) VALUES
(1, 'Budi Santoso', '081234567890', 'Menanam padi, merawat tanaman'),
(2, 'Siti Rahayu', '081234567891', 'Menyiram tanaman, memupuk'),
(3, 'Agus Wijaya', '081234567892', 'Panen, pemeliharaan plot'),
(4, 'Dewi Lestari', '081234567893', 'Monitoring pertumbuhan, penyiraman'),
(5, 'Joko Prabowo', '081234567894', 'Pengelolaan pupuk, perawatan tanah');
SELECT * FROM management_farm_farmers;

INSERT INTO management_farm_plots (plot_id, location, size, soil_type, farmer_id) VALUES
(1, 'Blok A Utara', 100.50, 'Tanah Liat', 1),
(2, 'Blok B Selatan', 75.25, 'Tanah Berpasir', 2),
(3, 'Blok C Timur', 120.75, 'Tanah Humus', 3),
(4, 'Blok D Barat', 85.00, 'Tanah Liat Berpasir', 4),
(5, 'Blok E Tengah', 95.30, 'Tanah Humus', 5);
SELECT * FROM management_farm_plots;

INSERT INTO management_farm_fertilizers (fertilizer_id, NAME, TYPE, recommended_usage) VALUES
(1, 'NPK 16-16-16', 'Kimia', '500g per 100m² setiap 2 minggu'),
(2, 'Kompos Organik', 'Organik', '2kg per 100m² setiap bulan'),
(3, 'Urea', 'Kimia', '300g per 100m² setiap 3 minggu'),
(4, 'Pupuk Kandang', 'Organik', '3kg per 100m² setiap bulan'),
(5, 'Pupuk Hijau', 'Organik', '1.5kg per 100m² setiap 2 bulan');
SELECT * FROM management_farm_fertilizers;

INSERT INTO management_farm_plants (plant_id, plot_id, growth_stage, watering_schedule, fertilizer_use) VALUES
(1, 1, 'Vegetatif', '2 kali sehari pagi-sore', 'NPK 16-16-16'),
(2, 2, 'Generatif', '1 kali sehari pagi', 'Kompos Organik'),
(3, 3, 'Pembungaan', '2 kali sehari', 'Urea'),
(4, 4, 'Pematangan', '1 kali sehari sore', 'Pupuk Kandang'),
(5, 5, 'Vegetatif', '2 kali sehari', 'Pupuk Hijau');
SELECT * FROM management_farm_plants;

INSERT INTO management_farm_plant_fertilizers (plant_id, fertilizer_id) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(2, 1),
(3, 4),
(4, 5),
(5, 2);
SELECT * FROM management_farm_plant_fertilizers;

INSERT INTO management_farm_harvests (harvest_id, plot_id, DATE, quantity, quality, farmer_id) VALUES
(1, 1, '2024-03-15', 250.75, 'Premium', 1),
(2, 2, '2024-03-16', 180.50, 'Sedang', 2),
(3, 3, '2024-03-17', 320.25, 'Premium', 3),
(4, 4, '2024-03-18', 195.80, 'Baik', 4),
(5, 5, '2024-03-19', 275.30, 'Premium', 5);
SELECT * FROM management_farm_harvests;

INSERT INTO management_farm_sales (sale_id, harvest_id, customer, price, delivery_date) VALUES
(1, 1, 'Toko Sembako Sejahtera', 1253750.00, '2024-03-16'),
(2, 2, 'Pasar Induk Jakarta', 902500.00, '2024-03-17'),
(3, 3, 'Restoran Bintang 5', 1601250.00, '2024-03-18'),
(4, 4, 'Supermarket Makmur', 979000.00, '2024-03-19'),
(5, 5, 'Eksportir PT Agri', 1376500.00, '2024-03-20');
SELECT * FROM management_farm_sales;

CREATE VIEW view_master AS
SELECT 
    p.plant_id,
    p.growth_stage,
    p.watering_schedule,
    p.fertilizer_use,
    pl.plot_id,
    pl.location,
    pl.size,
    pl.soil_type,
    pl.farmer_id
FROM management_farm_plants p
INNER JOIN management_farm_plots pl ON p.plot_id = pl.plot_id;

SELECT * FROM view_master;