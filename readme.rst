###################
Delivery TCDC
###################

This repo is in the walk of the existing TCDC project.
Its a further extension of the current TCDC project.
It adds the item request options for corporate customers of TCDC
Link to the TCDC Items : https://gist.github.com/rapee/ab1f0165d18eced78f55ed1893e0ea5f

*******************
Release Information
*******************
This repo contains in-development code 

*******************
Server Requirements
*******************

PHP version 5.4 or newer is recommended.

It should work on 5.2.4 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************
-  `Install CodeIgniter <http://www.codeigniter.com/user_guide/installation/index.html>`_
-  `Clone The Repoistory `_

***********
Copyright
***********
Boon Mee Lab 2016

***********************************************
Resources (Functions and Parameters Reference)
***********************************************
$Canceled = 0;           aka  Canceled
$Waiting_Confirm = 1;    aka  Submitted
$Waiting_Ship = 2;       aka  Confirmed 
$Waiting_Delivery = 3;   aka  Shipped 
$Waiting_Return = 4;     aka  Delivered
$Completed = 5;          aka  Returned
$Waiting_Update = 6      aka  Declined

* `does_table_exist`
  - Input ->  *Table Name*
  - Output -> *Boolean result True if exists else False*::

       Function to check if a table exists
       boolean = does_table_exist($tb_name);

* `does_database_exist`
  - Input ->  *Database Name*
  - Output -> *Boolean result True if exists else False*::

       Function to check if a database exists
       boolean = does_database_exist($tb_name);

* `insert_into_corporate_table`
  - Input ->  *HTTP POST with following input parameters*
    -'c_name'          => containing corporate name data
    -'c_address'       => containing corporate address data
    -'contact_person'  => containing corporate contact person data
    -'c_phone'         => containing corporate phone data
    -'c_status'        => containing corporate status data
  - Output -> *Boolean result True if sucessfully inserted else False*::

       Function to inset data into corporate table
       boolean = insert_into_corporate_table();
       input parameter are received using HTTP POST 

* `set_max_day`
  - Input ->  *HTTP POST *
  - Output -> *Boolean result True if exists else False*::

       Function to check if a database exists
       boolean = does_database_exist($tb_name);

* `does_database_exist`
  - Input ->  *Database Name*
  - Output -> *Boolean result True if exists else False*::

       Function to check if a database exists
       boolean = does_database_exist($tb_name);


- `insert_into_corporate_table`
	Input: 
	Output: 
- `submit_order`
	Input: 
	Output: 
- `get_all_corporate`
	Input: 
	Output: 
- `get_corporate_info_by_id`
	Input: 
	Output: 
- `get_corporate_info_by_name`
	Input: 
	Output: 
- `get_orders_by_corporateid`
	Input: 
	Output: 
- `get_items_by_orderid`
	Input: 
	Output: 
- `get_corporate_history`
	Input: 
	Output: 
- `confirm_order`
	Input: 
	Output: 
- `decline_order`
	Input: 
	Output: 
- `ship_order`
	Input: 
	Output: 
- `deliver_order`
	Input: 
	Output: 
- `complete_order`
	Input: 
	Output: 
- `cancle_order`
	Input: 
	Output: 
- `update_order_table`
	Input: 
	Output: 



