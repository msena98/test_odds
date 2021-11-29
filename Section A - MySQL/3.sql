SELECT salary INTO @s1 FROM employees WHERE last_name = "Bell";
SELECT first_name, last_name, salary FROM employees WHERE salary > @s1