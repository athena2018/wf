SELECT * FROM test.orders;
 USE test;
 UPDATE orders SET description = "NC" WHERE agent_code ="A002";
DELETE FROM orders  WHERE customer_code = "C00022";
