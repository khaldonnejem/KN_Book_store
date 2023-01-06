--Title Of Book And Name Of Author PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace FUNCTION get_book_info (p_book_id IN book.book_id%TYPE)
RETURN VARCHAR2
AS
  v_title book.title%TYPE;
  v_author_name author.author_name%TYPE;
BEGIN
  SELECT b.title, a.author_name
  INTO v_title, v_author_name
  FROM book b
  INNER JOIN book_author ba ON b.book_id = ba.book_id
  INNER JOIN author a ON ba.author_id = a.author_id
  WHERE b.book_id = p_book_id;

  RETURN 'Title Of Book :'|| v_title || '>>>>>>' ||  ' Author Name: ' || v_author_name;
END;
--CUSTOMER NAME And ADDRESS STATUS PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace FUNCTION get_customer_info (p_customer_id IN customer.customer_id%TYPE)
RETURN VARCHAR2
AS
  v_name customer.first_name%TYPE;
  v_address_status address_status.address_status%TYPE;
BEGIN
  SELECT b.first_name, a.address_status
  INTO v_name, v_address_status
  FROM customer b
  INNER JOIN customer_address ba ON b.customer_id = ba.customer_id
  INNER JOIN address_status a ON ba.status_id = a.status_id
  WHERE b.customer_id = p_customer_id;

  RETURN 'customer name :'|| v_name || '>>>>' || ' address status : ' || v_address_status;
END;