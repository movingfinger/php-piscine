SELECT f.id_genre, g.name AS `name_gemre`, f.id_distrib, d.name AS `ma,e+dostrob`, f.title AS `title_film`
FROM film AS f
LEFT JOIN genre AS g
ON f.id_genre = g.id_genre
LEFT JOIN distrib AS d
ON f.id_distrib = d.id_distrib
WHERE (f.id_genre >= 4 AND f.id_genre <= 8);
