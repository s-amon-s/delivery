  
  <div class="form-group yokform container" id="corporate_form">
    <br /><br /><br /><br />
    <label for="c_name">Corporate Name: </label>
    <input type="text" class="form-control" name="c_name" id="c_name" placeholder="                        amon@3g.edu" required><br />
    <label for="c_address">Address : </label>
    <input type="text" class="form-control" name="c_address" id='c_address' placeholder="___road, ____ "><br />
      <label for="c_status">Status: </label>
      <select class="form-control" id="c_status">
      <option value="1">ON</option>
      <option value="0">OFF</option>
      </select>
      <br />
      <label for="c_maxRent">Max Rent</label>
      <input type="number" step="1" class="form-control" name="c_maxRent" id="c_maxRent"
      placeholder = "maximum allowance per order" required><br />
      <div class="amon" align="center">
        <input type="submit" class="btn btn-info" value="Submit" onclick="corporate_insert()" >
      </div>
  </div>

  <div class="form-group yokform container" id="order_form">
    <br /><br /><br /><br />
    <label for="c_list">Select Corporate (dev_mode): </label>
    <select class="form-control" id="c_list">
    </select>
    <br />
    <label for="  ">Order Status: </label>
    <input type="number" max="5" class="form-control" name="o_status" id="o_status" placeholder=" registering, delivering, delivered, etc." required><br />
    <label for="o_code">Order Code : </label> <button onclick="generateRandom()">Generate Order Code</button>
    <input type="text" class="form-control" name="o_code" id='o_code' placeholder="xxxxYYYYYYYxxxxx"><br />
    <label for="i_list">Item_Selection:<p class="readOnly"> </p> </label>
    <select class="form-control" id="i_list" multiple="multiple">
    </select>
    <br />
    <label for="o_count">Order Count</label>
    <input type="number" class="form-control" name="o_count" id="o_count"
     placeholder="Order Count Per Item Selection" readonly><br />
    
    <label for="i_list">Delivery Date: </label>
    <input type="text" class="form-control" value="12-02-2012" id="o_delivery_date">
    
    <label for="i_list">Return Date: </label>
    <input type="text" class="form-control" value="12-02-2012" id="o_return_date">

    <label for="o_description">Order Description : </label>
    <input type="text" class="form-control" name="o_description" id='o_description' placeholder="xxxxYYYYYYYxxxxx"><br />
      <div class="amon" align="center">
      <input type="submit" class="btn btn-info" value="Submit" onclick="order_update()" >
      </div>
  </div>



