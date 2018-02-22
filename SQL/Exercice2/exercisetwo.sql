
SELECT agent_code, SUM(amount), count(id) FROM test.orders WHERE amount >=1000 GROUP BY agent_code ORDER BY SUM(amount) DESC;
