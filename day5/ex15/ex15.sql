SELECT REVERSE(SUBSTR(phone_number, 2, LENGTH(phone_number) - 1)) AS rebmunenohp
FROM distrib
WHERE phone_number LIKE "05%";
