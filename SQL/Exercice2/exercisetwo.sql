
SELECT agent_code, SUM(amount), COUNT(id) FROM test.orders WHERE amount >=1000 GROUP BY agent_code ORDER BY AVG(amount) DESC;
SELECT agent_code, SUM(amount), COUNT (id) FROM orders WHERE amount >=1000 GROUP BY agent_code;
SELECT agent_code, SUM (amount), COUNT (id)FROM orders WHERE amount >=1000 GROUP BY agent_code ORDER BY AVG(amount);
SELECT agent_code, SUM (amount), COUNT(id) FROM orders WHERE amount >=1000 GROUP BY agen_code ORDER BY AVG (amount) DESC;agent_code