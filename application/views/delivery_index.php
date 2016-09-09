<style>

@media screen and (min-width: 180px){
    .yokform{

    width: 82%;
    }
    .amon{
      margin: 0 auto;
    }
}

@media screen and (min-width: 480px){
  .yokform{

  width: 70%;
  }
  .amon{
    margin: 0 auto;
  }
}


@media screen and (min-width: 660px){
  .yokform{
  width: 29%;
  }
  .amon{
    margin: 0 auto;
  }
}
 
</style>

<form name="corporate_form" id="corporate_form" method="POST" enctype="application/x-www-form-urlencoded" action="#" onsubmit="check()" >
    <div class="form-group yokform container">
      <br /><br /><br /><br /><label for="c_name">Corporate Name: </label>
      <input type="text" class="form-control" name="c_name" placeholder="                        amon@3g.edu" required><br />
      <label for="c_address">Address : </label>
      <input type="text" class="form-control" name="c_address" placeholder="                                *****"><br />
        <label for="c_status">Status: </label>
        <select class="form-control">
        <option value="1">ON</option>
        <option value="0">OFF</option>
        </select>
        <br />
        <label for="c_maxRent">Max Rent</label>
        <input type="number" step="1" class="form-control" name="c_maxRent" placeholder="Username For This Bot" required><br />
          <div class="amon" align="center">
        <input type="submit" class="btn btn-info" value="Submit" >
        </div>
      </div>
  </form>
 <script>
function check() {
    //for form validation
  }
</script>
