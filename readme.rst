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
-  `Clone The Repoistory`_

***********
Copyright
***********
Boon Mee Lab 2016

***********************************************
Resources (Functions and Parameters Reference)
***********************************************
* `Order Status values and its meaning`::

       $Canceled = 0;           aka  Canceled
       $Waiting_Confirm = 1;    aka  Submitted
       $Waiting_Ship = 2;       aka  Confirmed 
       $Waiting_Delivery = 3;   aka  Shipped 
       $Waiting_Return = 4;     aka  Delivered
       $Completed = 5;          aka  Returned
       $Waiting_Update = 6      aka  Declined

* `does_table_exist`:

  - Input ->  *Table Name*
  - Output -> *Boolean result True if exists else False*::

       Function to check if a table exists
       boolean = does_table_exist($tb_name);

* `does_database_exist`:

  - Input ->  *Database Name*
  - Output -> *Boolean result True if exists else False*::

       Function to check if a database exists
       boolean = does_database_exist($tb_name);

* `insert_into_corporate_table`:

  - Input ->  *HTTP POST with following input parameters*:

  	-'c_name'          => containing corporate name data

    	-'c_address'       => containing corporate address data

    	-'contact_person'  => containing corporate contact person data

    	-'c_phone'         => containing corporate phone data

    	-'c_status'        => containing corporate status data
  - Output -> *Boolean result True if sucessfully inserted else False*::

       Function to inset data into corporate table
       boolean = insert_into_corporate_table();
       input parameter are received using HTTP POST

       `Example Post Method Using AJAX`
       
       var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' + 'insert_into_corporate_table';

       var c_name = $('#c_name').val();
	   var c_address = $('#c_address').val();
	   var c_status = $('#c_status').val();
	   var c_contact_person = $('#c_contact_person').val();
	   var c_phone = $('#c_phone').val();
	 
	   $.ajax({ 
	     url: final_url,
	     type:'post',
	     data:{ c_name: c_name, c_address:c_address, c_status:c_status, c_contact_person:c_contact_person,c_phone:c_phone},
	     success: function(resp){
	     }
	     }); 

* `set_max_day`:

  - Input ->  *HTTP POST id and number*:

    -'id'          => id of the corporate
    -'number'      => number of days allowance
  - Output -> *Boolean result True if successfully executed else False*::

       Function for admin to set a corporate's max day for renting items
       boolean = does_database_exist($tb_name);

* `set_max_rent`:

  - Input ->  *HTTP POST id and number*:

    -'id'          => id of the corporate
    -'number'      => number of items allowance 
  - Output -> *Boolean result True if successfully executed else False*::

       Function for admin to set a corporate's max day for renting items
       boolean = does_database_exist($tb_name);

* `submit_order`:

  - Input ->  *HTTP POST with following input parameters*:

	    -'o_status'          => containing corporate name data
	    -'o_code'       => containing corporate address data
	    -'o_count'  => containing corporate contact person data
	    -'o_description'         => containing corporate phone data
	    -'c_id'        => containing corporate status data
	    -'i_list'      => containing array of BIB_ID of items selected
  - Output -> *Boolean result True if sucessfully inserted else False*::

       Function to inset data into order and order_item table
       AJAX call be made in the similar manner as insert_into_corporate_table
       boolean = submit_order();
       input parameter are received using HTTP POST 

* `get_all_corporates`:

  - Input ->  *No Inputs*
  - Output -> *JSON array containing list of all the corporates and their info*::

       Function to get all the corporates info
       Jsaon_Array = get_all_corporates();

* `get_corporate_info_by_id`:

  - Input ->  *HTTP POST id*:

    -'id'          => id of the corporate
  - Output -> *JSON data of the corresponding corporate*::

       Function for getting correcponding corporate info from input HTTP post id parameter
       Json_Data = get_corporate_info_by_id();

* `get_corporate_info_by_name`:

  - Input ->  *HTTP POST name*:

    -'name'          => name of the corporate
  - Output -> *JSON data of the corresponding corporate*::

       Function for getting correcponding corporate info from input HTTP post name parameter
       Json_Data = get_corporate_info_by_name();

* `get_items_by_orderid`

  - Input ->  *HTTP POST id*

    -'id'          => id of the order
  - Output -> *JSON ARRAY containing items*::

       Function for getting items made in particular order
       Json_Data = get_items_by_orderid();

* `get_orders_by_corporateid`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *JSON ARRAY containing orders made by corresponding corporate*::

       Function for getting orders made by a corporate
       Json_Data = get_orders_by_corporateid();

* `get_corporate_history`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *JSON ARRAY containing orderr and orders' items till date made by corresponding corporate*::

       Function for getting corporate order history
       Json_Object = get_orders_by_corporateid();
       Count(Json_Object) will yield total orders made till date

* `confirm_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to confirm a corporate's order
       This function sets order_status to value 2 and stores the confirm date into o_confirm_date field
       boolean = confirm_order();


* `decline_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to decline a corporate's order
       This function sets order_status to value 6 and stores the decline date into o_decline_date field
       boolean = decline_order();


* `ship_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to ship a corporate's order
       This function sets order_status to value 3 and stores the ship date into o_ship_date field
       boolean = ship_order();       

* `deliver_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to deliver a corporate's order
       This function sets order_status to value 4 and stores the deliver date into o_deliver_date field
       boolean = deliver_order(); 

* `complete_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to complete a corporate's order
       This function sets order_status to value 5 and stores the complete date into o_complete_date field. This is the last stage of the order cycle and means the items have been recieved back.
       boolean = complete_order();       
       
* `cancle_order`

  - Input ->  *HTTP POST id*

    -'id'          => id of the corporate
  - Output -> *Boolean result True if successfully executed else False*::


       Function for admin to cancles a corporate's order
       This function sets order_status to value 0 and stores the cancle date into o_cancle_date field.
       This resets the order. Means order is no more available. Hence new request must be made.
       boolean = cancle_order(); 


- `update_order_table`
	Input: 
	Output: 

*********************
Mock Data for Tables
*********************

Orders.sql Corporate.sql and Orders_Items.sql files can be found under application/models folder
These file can be imported into database manually or run a script to execute each line dynamically.
