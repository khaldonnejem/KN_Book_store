--Delete Book PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure delete_book(bookd IN NUMBER)
is
BEGIN
  Delete from book where book_id = bookd;
END;
--Dispaly Authors PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure dis_author(c1 out SYS_REFCURSOR)
is 
begin 
open c1 for
select
author_id,
author_name
from author;
end;
--Dispaly BOOK1 PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure dis_book1(c1 out SYS_REFCURSOR)
is 
begin 
open c1 for
select
book_id,
title,
isbn13,
language_id,
num_pages,
publication_date,
publisher_id
from book ORDER BY book_id ASC;
end;
--Dispaly Customers PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure dis_customer(c1 out SYS_REFCURSOR)
is 
begin 
open c1 for
select
customer_id,
first_name,
last_name,
email
from customer;
end;
--Number of books PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace PROCEDURE num_books1(cur OUT SYS_REFCURSOR)
AS
BEGIN
  OPEN cur FOR
  SELECT a.author_name, COUNT(*) AS num_books1
  FROM book_author ba
  JOIN book b ON ba.book_id = b.book_id
  JOIN author a ON ba.author_id = a.author_id
  GROUP BY a.author_name;
END;
--Register Book PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure register_book(book_id IN NUMBER, title IN VARCHAR2,isbn13 IN VARCHAR2,
    language_id in NUMBER ,num_pages in NUMBER ,publication_date in date ,publisher_id in NUMBER)
is
BEGIN
  INSERT INTO book (book_id,title, isbn13,language_id,num_pages,publication_date,publisher_id)
  VALUES (book_id,title, isbn13,language_id,num_pages,publication_date,publisher_id);
END;
--Update Book PROCEDURE---------------------------------------------------------------------------------------------------------------
create or replace procedure update_book(newbook IN NUMBER, new_title in varchar2, nisbn13 in varchar2 , newlang in number , newpages in number ,
newdate in date ,newpub in number)
is
BEGIN

    update book 
    set 
    title  = new_title,
     isbn13 = nisbn13,
     language_id = newlang,
     num_pages = newpages,
     publication_date = newdate,
     publisher_id = newpub
    where book_id = newbook;

END;

