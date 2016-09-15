<script>  

  var maxRent = []; // array containing max rent values for each corporates
  var canOrder = []; // order status of each corporates
  var selected_items = null; // to store the selected items from item list

  $( function(){

    document.getElementById('corporate_form').style.display = "none";
    document.getElementById('order_form').style.display = "none";

    // Getting items from TCDC API
    $.ajax({ 
      url: 'http://library.tcdc.or.th/collection/json/videorecording/popular?page=2',
      type: 'get',
      success: function(resp){
        var records = resp.records;
        
        $.each(records, function(i, item) {
          $('<option>').val(item.bibid).text(item.bibid).appendTo('#i_list');
        });

        //update Log
        var para = document.createElement("P");
        var t = document.createTextNode('BIB ID has been loaded');
        para.appendChild(t);
        document.getElementById("log_body").appendChild(para);
        console.log(resp);
      }    
    });

    //Setting Datepicker for the input with the supported format
    $( "#o_delivery_date" ).datepicker({ dateFormat: 'yy/mm/dd'});
    $( "#o_return_date" ).datepicker({ dateFormat: 'yy/mm/dd'});
  });

  //Function for inserting into corporate table using ajax asynch call
  function corporate_insert() {

  //for form validation code goes here
    var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' + 'insert_into_corporate_table';
  
    var c_name = $('#c_name').val();
    var c_address = $('#c_address').val();
    var c_status = $('#c_status').val();
    var c_maxRent = $('#c_maxRent').val();
 
    $.ajax({ 
      url: final_url,
      type:'post',
      data:{ c_name: c_name, c_address:c_address, c_status:c_status, c_maxRent:c_maxRent},
      success: function(resp){
        res = JSON.parse(resp);
        console.log(res);
        //update Log
        var para = document.createElement("P");
        var t = document.createTextNode(res.log);
        para.appendChild(t);
        document.getElementById("log_body").appendChild(para);
        console.log(resp);
      }    
    });
}

$("#seed_table").change(function(){
  var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' + 'execute_sql_file';
  var file_name = $("#seed_table option:selected").val();
  console.log(file_name);
    
  $.ajax({ 
    url: final_url,
    type:'post',
    data:{ file_name:file_name},
    success: function(resp){
      console.log(resp);
      var para = document.createElement("P");
      var t = document.createTextNode(file_name + " has been executed, "+$("#seed_table option:selected").text() +" has been populated");
      para.appendChild(t);
      document.getElementById("log_body").appendChild(para);
      console.log(resp);
    }    
  });
});  



  //Function for inserting into Order table and Order_Item tables using ajax asynch call
 function order_update() {
  //for form validation code goes here

  //Check if the selected corporate can make order
  if(canOrder[$('#c_list').prop('selectedIndex')] == 1){
    
    var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' + 'submit_order';
   
    var o_status = $('#o_status').val();
    var o_code = $('#o_code').val();
    var i_list = $('#i_list').val();
    var o_count = $('#o_count').val();
    var o_return_date = $('#o_return_date').val();
    var o_delivery_date = $('#o_delivery_date').val();
    var o_description = $('#o_description').val();
    var c_id = $('#c_list').val();
    var c_name = $("#c_list option:selected").text();

    console.log(i_list);
    
    $.ajax({ 
      url: final_url,
      type:'post',
      data:{ o_status: o_status, o_code:o_code, o_count:o_count, o_delivery_date:o_delivery_date, o_return_date:o_return_date,o_description:o_description,c_name:c_name,c_id:c_id,i_list:i_list},
      success: function(resp){
        res = JSON.parse(resp);
        console.log(res);
        //update Log
        var para = document.createElement("P");
        var t = document.createTextNode(res.log);
        para.appendChild(t);
        document.getElementById("log_body").appendChild(para);
        console.log(resp);
      }    
    });
  }else{ //If the corporate can't make order alert
    alert("Your order status is OFF, meaning you can't order");
  }
}
  
  //Function for genertaing random order code
  function generateRandom(){
    var text = "";
    var possible_values = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  
    for(var i=0;i < 19;i++)
        text += possible_values.charAt(Math.floor(Math.random() * possible_values.length));

    $('#o_code').val(text);
  }

  //Changes on Corporate List, such as selecting off status corporate will make item selection disabled
  $( "#c_list" ).change(function(){
      if(canOrder[$(this).prop('selectedIndex')] == 0){
        $('#i_list').attr('disabled', true);
        $('.readOnly').text('Read-Only');
      }else{
        $('#i_list').attr('disabled', false);
        $('.readOnly').text('');
      }
  });

  //Get all the corporates
  $('#show_order_table,#create_tbO').click(function(){
    //make sure the form is visible
    document.getElementById('order_form').style.display = "block";
    document.getElementById('corporate_form').style.display = "none";
    var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' + 'get_all_corporates';
    $.ajax({
      url: final_url,
      type: 'get',
      success: function(resp){
        res = JSON.parse(resp);
        console.log(res);
        var c_list = res.info;
        $.each(c_list, function(i, item) {
          $('<option>').val(item.c_id).text(item.c_name).appendTo('#c_list');
          maxRent.push(item.c_maxRent);
          canOrder.push(item.c_status);
        });
        canOrder[0] == 0 ? $('#i_list').attr('disabled', true) : $('#i_list').attr('disabled', false);
      }    
    });
  });

  //Validate order status
  $( "#o_status" ).change(function(){
    $(this).val() < 1 ? $(this).val(1) : $(this).val() > 5 ? $(this).val(4) : $(this).val($(this).val());
  });

  //Validate item_list according to corporate status and max_rent variable
  $( "#i_list" ).change(function(){
    var max = parseInt(maxRent[$('#c_list').prop('selectedIndex')]) + 3;
    console.log(max);
    if($("select option:selected").length > max){
      $(this).val(selected_items);
    }else{
      selected_items = $(this).val();
      console.log($(this).val());
      $('#o_count').val($(this).val().length);
    }
  });

  //Show Corporate Insert Table
  $('#show_corporate_table').click(function(){
    document.getElementById('order_form').style.display = "none";
    document.getElementById('corporate_form').style.display = "block";
  });

  // Just for testing
  function divert(url){
    var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' +url;
    $.ajax({
      url: final_url,
      type:  'get',
      success: function(resp){
        res = JSON.parse(resp);
        //update Log
        var para = document.createElement("P");
        var t = document.createTextNode(res.log);
        para.appendChild(t);
        document.getElementById("log_body").appendChild(para);

        //update button
        var button = document.getElementById(url);
        button.textContent = "";
        var span = document.createElement("span");
        var att = document.createAttribute("class");
        att.value = res.logo;
        span.setAttributeNode(att);
        button.appendChild(span);
        var t = document.createTextNode(res.code);
        button.appendChild(t);
        button.id = res.url;

        document.getElementById('order_form').style.display = "none";
        document.getElementById('corporate_form').style.display = "none";
        //show_form_if_corporate_table_created
        if (res.url == "delete_tbC") {
          document.getElementById('corporate_form').style.display = "block";
        }
        //show_form_if_order_table_created
        if (res.url == "delete_tbO") {
          document.getElementById('order_form').style.display = "block";
        }

        console.log(resp);
      }
    });
  }
</script>
</body>
</html>