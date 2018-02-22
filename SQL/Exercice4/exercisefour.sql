SELECT * FROM person_address;
ALTER TABLE person_address ADD CONSTRAINT FOREIGN KEY (personid) REFERENCES person(id);
ALTER TABLE person_address ADD CONSTRAINT FOREIGN KEY (addressid) REFERENCES address(id);
ALTER TABLE person_address ADD CONSTRAINT FOREIGN KEY (address_typeid) REFERENCES address_type(id);

SELECT * FROM town ;
ALTER TABLE town ADD CONSTRAINT FOREIGN KEY (Countryid) REFERENCES country(id);
ALTER TABLE address ADD CONSTRAINT FOREIGN KEY (Townid) REFERENCES Town(id);
