CREATE TABLE Area(
	id INT IDENTITY(1,1),
    AreaName VARCHAR(10) UNIQUE,	
	AreaCode VARCHAR(10) PRIMARY KEY
);


CREATE TABLE Territory(
	id INT IDENTITY(1,1),
    TerritoryName VARCHAR(10) UNIQUE,
    TerritoryCode VARCHAR(10) PRIMARY KEY,	
	AreaCode VARCHAR(10) FOREIGN KEY REFERENCES Area(AreaCode),
);


CREATE TABLE EngineerArea(
	id INT IDENTITY(1,1),	
	AreaCode VARCHAR(10) FOREIGN KEY REFERENCES Area(AreaCode),
    UserId BIGINT FOREIGN KEY REFERENCES users(id),
	--staffid VARCHAR(10) FOREIGN KEY REFERENCES user(staffid),
);


CREATE TABLE TechnitianTerritory(
	id INT IDENTITY(1,1),	
	TerritoryCode VARCHAR(10) FOREIGN KEY REFERENCES Territory(TerritoryCode),
	UserId BIGINT FOREIGN KEY REFERENCES users(id),
);


CREATE TABLE Target(
	id INT IDENTITY(1,1),
    TechnitianId BIGINT FOREIGN KEY REFERENCES users(id),
	EngineerId BIGINT FOREIGN KEY REFERENCES users(id),
	WarrantyService INT,
	PostWarrantyService INT,
	Note VARCHAR(100),
	EntryDate DATETIME DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE Product(
	id INT IDENTITY(1,1),
    ProductName VARCHAR(10) UNIQUE,	
	ProductCode VARCHAR(10) PRIMARY KEY
);


CREATE TABLE CallType(
	id INT IDENTITY(1,1),
    CallTypeName VARCHAR(10) UNIQUE,	
	CallTypeCode VARCHAR(10) PRIMARY KEY
);

CREATE TABLE ServiceType(
	id INT IDENTITY(1,1),
    ServiceTypeName VARCHAR(10) UNIQUE,	
	ServiceTypeCode VARCHAR(10) PRIMARY KEY
);



CREATE TABLE JobCard(
	id INT IDENTITY(1,1),	
	TerritoryCode VARCHAR(10) FOREIGN KEY REFERENCES Territory(TerritoryCode),
	AreaCode VARCHAR(10) FOREIGN KEY REFERENCES Area(AreaCode),
	EngineerId BIGINT FOREIGN KEY REFERENCES users(id),
	TechnitianId BIGINT FOREIGN KEY REFERENCES users(id),

	ProductCode VARCHAR(10) FOREIGN KEY REFERENCES Product(ProductCode),
	CallTypeCode VARCHAR(10) FOREIGN KEY REFERENCES CallType(CallTypeCode),
	ServiceTypeCode VARCHAR(10) FOREIGN KEY REFERENCES ServiceType(ServiceTypeCode),
    
	CustomerName VARCHAR(100),
	CustomerMobile VARCHAR(10),
	Hour FLOAT(10),
	ServiceWantedDate DATETIME NOT NULL,

	EntryDate DATETIME DEFAULT CURRENT_TIMESTAMP
);
