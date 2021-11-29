SELECT s1.manager_id, s1.salary FROM employees s1
LEFT JOIN employees s2 ON s1.manager_id = s2.manager_id AND s1.salary > s2.salary
WHERE s2.manager_id IS NULL ORDER BY s1.manager_id;