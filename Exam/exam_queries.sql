-- 1. Display total number of albums sold per artist
SELECT artist, COUNT(*) AS album_count
FROM albums
GROUP BY artist
ORDER BY album_count DESC;

-- 2. Display combined album sales per artist
SELECT artist, SUM(sales_2022) AS total_sales
FROM albums
GROUP BY artist
ORDER BY total_sales DESC;

-- 3. Display the top 1 artist who sold most combined album sales
SELECT artist, SUM(sales_2022) AS total_sales
FROM albums
GROUP BY artist
ORDER BY total_sales DESC
LIMIT 1;

-- 4. Display the top 10 albums per year based on their number of sales
SELECT *FROM (SELECT *, ROW_NUMBER() OVER (PARTITION BY YEAR(date_released) ORDER BY sales_2022 DESC) AS rank
    FROM albums) AS ranked WHERE rank <= 10;

-- 5. Display list of albums based on the searched artist 
SELECT * FROM albums WHERE artist LIKE 'Monsta X';
