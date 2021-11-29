SELECT first_name, last_name, job_title, c.department_id FROM employees a
INNER JOIN jobs b ON b.job_id = a.job_id
INNER JOIN departments c ON c.department_id = a.department_id WHERE c.location_id = 2400