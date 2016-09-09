<script>

document.getElementById('corporate_form').style.display = "none";

function divert(url){
	console.log("id: "+url);
  console.log('<?=base_url();?>');
  var final_url = 'http://' + '<?=base_url();?>' + 'index.php/Welcome/' +url;
     $.ajax({   url: final_url,
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
                      span = button.childNodes[0];
                      span.nextElementSibling.className = res.logo;
                      span.textContent = res.code;

                      button.id = res.url;

                      //show_form_if_corporate_table_created
                      if (res.log == "Corporate Table Created") {
                        document.getElementById('corporate_form').style.display = "block";
                      }else if(res.log == "Corporate Table Deleted"){
                        document.getElementById('corporate_form').style.display = "none";
                      }
                      
                      console.log(resp);
                    }    
                });
  }

</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>