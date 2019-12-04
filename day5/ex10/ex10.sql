SELECT f.title AS 'Title', f.summary AS 'Summary', f.prod_year
FROM film AS f
INNER JOIN genre AS g
ON f.id_genre = g.id_genre
WHERE g.name = 'erotic'
ORDER BY f.prod_year DESC;